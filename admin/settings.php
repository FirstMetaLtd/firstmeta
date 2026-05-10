<?php
$settings='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';
    
   
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token'] && isset($_POST['form_data'])){
  extract($_POST);

$filename = $_FILES['logo']['name'];
if($filename!=''){
$file_size = $_FILES["logo"]["size"];
$filesize=$file_size/1024;
$allowed = array('gif', 'png', 'jpg','webp','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $allowed)) {
    $file_type = 'is_image';
    $filedate= date('Ymd')."logo".date('His');
          $insertfile = "img/".$filedate.".".$ext ;
          move_uploaded_file($_FILES["logo"]["tmp_name"], '../'.$insertfile);
}else{
  $error=3;
  echo "<script>swal('Error!', 'Failed to post. File must be an image', 'error').then(function() {
    window.location = 'add-post';
})</script>";
}
}else{
  $insertfile=$oldlogo;
}

   
        if($error == ''){

            $arr['logo']=$insertfile;
            $arr['site_title']=$site_title;
            $arr['email']=$email;
            $arr['phone']=$phone;
            $arr['facebook_url']=$facebook_url;
            $arr['instagram_url']=$instagram_url;
            $arr['twitter_url']=$twitter_url;
            $arr['linkedin_url']=$linkedin_url;
            
            $update = "UPDATE `general_settings` SET `logo`=:logo,`site_title`=:site_title,`email`=:email,`phone`=:phone,`facebook_url`=:facebook_url,`instagram_url`=:instagram_url,`twitter_url`=:twitter_url,`linkedin_url`=:linkedin_url WHERE id=1";
            $stm = $con->prepare($update);
            if($stm->execute($arr)){
                      echo "<script>swal('Success!', 'Settings updated successfully.', 'success').then(function() {
                                  window.location = 'settings';
                              })</script>";
            }
        }else{
          echo 'error';
          echo "<script>swal('Error!', 'Try Again.', 'error').then(function() {
            window.location = 'settings';
        })</script>";
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
                    <label  class="col-sm-2 col-form-label">Site Logo</label>
                    <div class="col-sm-10">
                        <div class="row">
                           <div class="col-sm-2">
                             <img src="<?=$baseurl.$set->logo;?>" width="150px">
                             <input type="hidden" value="<?=$set->logo;?>" name="oldlogo">
                           </div>
                           <div class="col-sm-10">
                             
                             <input type="file" class="form-control" name="logo" >
                           </div>
                        </div>
                        
                    </div>
                    
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Site Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="site_title"  value="<?=$set->site_title;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email"  value="<?=$set->email;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone"  value="<?=$set->phone;?>" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Facebook URL</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="facebook_url"  value="<?=$set->facebook_url;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Instagram URL</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="instagram_url"  value="<?=$set->instagram_url;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Linkedin URL</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="linkedin_url"  value="<?=$set->linkedin_url;?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Twitter URL</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="twitter_url"  value="<?=$set->twitter_url;?>" required>
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