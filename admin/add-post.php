<?php
$addpost='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';

        $sqlforcats = 'SELECT * FROM services order by id desc';
        $stmcat = $con->prepare($sqlforcats);
        $stmcat->execute();
        $categories = $stmcat->fetchAll(PDO::FETCH_OBJ);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=$baseurl;?>admin/">Home</a></li>
              <li class="breadcrumb-item active">Add New Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token'] && isset($_POST['form_data'])){
  extract($_POST);

$filename = $_FILES['image']['name'];
if($filename!=''){
$file_size = $_FILES["image"]["size"];
$filesize=$file_size/1024;
$allowed = array('gif', 'png', 'jpg','webp','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $allowed)) {
    $file_type = 'is_image';
    $filedate= date('Ymd')."post".date('His');
          $insertfile = "img/posts/".$filedate.".".$ext ;
          move_uploaded_file($_FILES["image"]["tmp_name"], '../'.$insertfile);
}else{
  $error=3;
  echo "<script>swal('Error!', 'Failed to post.File must be an image', 'error').then(function() {
    window.location = 'add-post';
})</script>";
}
}else{
  $insertfile='NA';
}

        $stat=true;
        $post_id=rand(111,9999999);
        while($stat)
          {
            $que="select post_id from posts where post_id=:post_id limit 1";
            $stmforpost_id = $con->prepare($que);
            $checkpost_id = $stmforpost_id->execute(['post_id'=>$post_id]);
            if(($checkpost_id)){
                $data = $stmforpost_id->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data)>0)
                {
                    $post_id=rand(111,9999999);
                }
                else
                {
                $stat=false;
                }
            }
          }

          
        if(strlen($description)>14000){
          $error='Size is too large';
          // echo strlen($description);
          echo "<script>swal('Error!', 'Description size is too large.', 'error').then(function() {
           window.history.back();
        })</script>";
        }
            
   
    
        if($error == ''){
          
          $slug_title = esc($title).$post_id;
          $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($slug_title)));

          date_default_timezone_set('Asia/Kolkata');

          $todaydate =  date('y-m-d H:i:s');
           
            $arr['title']=$title;
            $arr['post_for']="Normal";
            $arr['video_url']=esc($video_url);
            $arr['short_desc']=$short_desc;
            $arr['description']=$description;
            $arr['meta_description']=$meta_description;
            $arr['post_id']=$post_id;
            $arr['tags']=$tags;
            $arr['image']=$insertfile;
            $arr['date']=$todaydate;
            $arr['meta_keywords']=$meta_keywords;
            $arr['status']='Active';
            $arr['slug']=$slug;

            // echo strlen($short_desc).'<br>';
            
            
            $addposts = "INSERT INTO `posts`(`post_for`,`short_desc`,`video_url`,`post_id`, `title`, `description`, `image`, `tags`, `meta_keywords`, `meta_description`, `date`, `status`,`slug`) 
            VALUES (:post_for,:short_desc,:video_url,:post_id,:title,:description,:image,:tags,:meta_keywords,:meta_description,:date,:status,:slug)";
            $stm = $con->prepare($addposts);
            if($stm->execute($arr)){
                      echo "<script>swal('Success!', 'Post Added successfully.', 'success').then(function() {
                                  window.location = 'add-post';
                              })</script>";
            }
        }else{
          echo 'error';
        }
}
    $_SESSION['token'] = get_random_string(60);
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
             
             <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
             <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Post Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title"  placeholder="Enter here..." required>
                    </div>
                  </div>


                
                  
                  <div class="form-group row" >
                    <label  class="col-sm-2 col-form-label" >Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control"  maxlength="490" name="short_desc" rows="3" required></textarea>
                      <span class="text-danger text-sm">Maximum length 400 letters.</span>
                    </div>
                  </div>

                 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10" >
                      <textarea class="form-control" id="summernote" name="description" rows="12" required></textarea>
                      <span class="text-danger text-sm">Maximum length 4000 letters.</span>
                    </div>
                  </div>

                 

                 

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Meta Keywords</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="meta_keywords"  placeholder="" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Meta Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="meta_description"  placeholder="" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Tags (seperated by ,)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tags"  placeholder="entertainment,technology" required>
                    </div>
                  </div>
               


              
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="form_data">Submit</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>

   function displayDivDemo(id,elementValue) {
      document.getElementById(id).style.display = elementValue.value == '1' ? 'none' : '';
      document.getElementById('imgdiv').style.display = elementValue.value == '1' ? '' : 'none';


   }
</script>
<?php include 'private/footer.php';?>