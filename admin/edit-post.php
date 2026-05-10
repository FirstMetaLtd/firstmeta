<?php
$activeposts='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';

$sqlforcats = 'SELECT * FROM category order by id desc';
        $stmcat = $con->prepare($sqlforcats);
        $stmcat->execute();
        $categories = $stmcat->fetchAll(PDO::FETCH_OBJ);

$sql = 'SELECT * FROM posts where post_id=:post_id';
$statement = $con->prepare($sql);
$statement->execute(['post_id'=>$_GET['post_id']]);
$pages = $statement->fetchAll(PDO::FETCH_OBJ);
if(count($pages)>0){
    $p=$pages[0];
}

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token'] && isset($_POST['form_data'])){
extract($_POST);
$post_id=$_GET['post_id'];

$filename = $_FILES['image']['name'];

if($filename!=''){
$file_size = $_FILES["image"]["size"];
$filesize=$file_size/1024;
$allowed = array('gif', 'png', 'jpg','webp','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $allowed)) {
    $file_type = 'is_image';
    $filedate= date('Ymd')."asiantimes".date('His');
          $insertfile = "img/posts/".$filedate.".".$ext ;
          move_uploaded_file($_FILES["image"]["tmp_name"], '../'.$insertfile);
}else{
  $error=3;
  echo "<script>swal('Error!', 'Failed to post.File must be an image', 'error').then(function() {
    window.location = 'add-post';
})</script>";
}
}else{
  $insertfile=$oldimage;
}


       


        if(strlen($description)>14000){
          $error='Size is too large';
          echo strlen($description);
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
            
            $arr['short_desc']=$short_desc;
           
            $arr['description']=$description;
            $arr['meta_description']=$meta_description;
            $arr['post_id']=$post_id;
            $arr['tags']=$tags;
            $arr['image']=$insertfile;
          
            $arr['meta_keywords']=$meta_keywords;
           
            $arr['slug']=$slug;

            // echo strlen($short_desc).'<br>';
            
            
            $addposts = "UPDATE `posts` SET `title`=:title,`short_desc`=:short_desc,`description`=:description,`image`=:image,`tags`=:tags,`meta_keywords`=:meta_keywords,`meta_description`=:meta_description,`slug`=:slug,`post_for`=:post_for WHERE post_id=:post_id";
            $stm = $con->prepare($addposts);
            if($stm->execute($arr)){
                      echo "<script>swal('Success!', 'Post Updated successfully.', 'success').then(function() {
                                  window.history.go(-2);
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
                      <input type="text" class="form-control" name="title"  value="<?=$p->title;?>" required>
                    </div>
                  </div>


                 
                  <input type="hidden" value="<?=$p->image;?>" name="oldimage">
                  
                  
                  <div class="form-group row" >
                 
                    <label  class="col-sm-2 col-form-label" >Image</label>
                    <div class="col-sm-10">
                      <img src="<?=$baseurl.$p->image;?>" width="200px">
                      <input type="file" class="form-control" name="image">
                    </div>
                  </div>

                  

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control"  maxlength="490" name="short_desc" rows="3" required><?=$p->short_desc;?></textarea>
                      <span class="text-danger text-sm">Maximum length 400 letters.</span>
                    </div>
                  </div>

                 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10" >
                      <textarea class="form-control" id="summernote" name="description" rows="12" required><?=$p->description;?></textarea>
                      <span class="text-danger text-sm">Maximum length 4000 letters.</span>
                    </div>
                  </div>

                 

                 

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Meta Keywords</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="meta_keywords" value="<?=$p->meta_keywords;?>"  placeholder="" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Meta Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="meta_description" value="<?=$p->meta_description;?>"  placeholder="" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Tags (seperated by ,)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tags" value="<?=$p->tags;?>"  placeholder="entertainment,technology" required>
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

 
<?php include 'private/footer.php';?>