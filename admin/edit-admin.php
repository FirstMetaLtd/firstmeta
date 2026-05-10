<?php
$admins='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';


$sql = 'SELECT * FROM admin where id=:id';
$statement = $con->prepare($sql);
$statement->execute(['id'=>$_GET['id']]);
$admins = $statement->fetchAll(PDO::FETCH_OBJ);
if(count($admins)>0){
    $a=$admins[0];
    $all_role=explode(',',$a->role);
}else{
    echo "<script>window.location='home'<script>";
}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Create Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Create Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
<?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']){
    $email = $_POST['email'];
    

    if(!preg_match('/^[\w\-]+@[\w\-]+.[\w\-]+$/', $email)){
        $error="Please Enter A Valid Email";
        echo "<script>swal('Error!', 'Please enter a valid email address', 'error').then(function() {
                            window.history.go(-1);
                        })</script>";
    }

       



        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
        $date = date('d-m-Y H:i:s');
        



        if($error == ''){
            $name=esc($_POST['name']);
            $type=esc($_POST['type']);
            $role=implode(',',$_POST['role']);
            // $password=esc($_POST['password']);
            // $password=password_hash($password,PASSWORD_BCRYPT);

            $arr['username']=$name;
            $arr['id']=$_GET['id'];
            $arr['email']=$email;
            
            $arr['type']=$type;
            $arr['role']=$role;
            

            $addadmin = "UPDATE `admin` SET `username`=:username,`email`=:email,`type`=:type,`role`=:role WHERE `id`=:id";
            $stm = $con->prepare($addadmin);
            if($stm->execute($arr)){
                    echo "<script>swal('Success!', 'Admin updated successfully.', 'success').then(function() {
                            window.location = 'add-admin';
                        })</script>";
            }
        }

}
    $_SESSION['token'] = get_random_string(60);
    ?>
             <form class="form-horizontal" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                <div class="card-body">
                  
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Employee Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?=$a->username;?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Employee Type</label>
                    <div class="col-sm-10">
                      <select type="text" class="form-control" name="type"  required>
                        <option disabled>Select</option>
                        <option>Sub admin</option>

                      </select>
                    </div>
                  </div>
                  
                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                      
                      
                        
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="Blogs" name="role[]" value="Blogs" <?php if(in_array("Blogs",$all_role)){ echo "checked"; } ?>>
                          <label for="Blogs" class="custom-control-label">Blogs</label>
                        </div>
                        
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="Career" name="role[]" value="Career" <?php if(in_array("Career",$all_role)){ echo "checked"; } ?>>
                          <label for="Career" class="custom-control-label">Career</label>
                        </div>
                        
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="Team" name="role[]" value="Team" <?php if(in_array("Team",$all_role)){ echo "checked"; } ?> >
                          <label for="Team" class="custom-control-label">Team</label>
                        </div>
                        
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="Services" name="role[]" value="Services" <?php if(in_array("Services",$all_role)){ echo "checked"; } ?> >
                          <label for="Services" class="custom-control-label">Services</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="Products" name="role[]" value="Products" <?php if(in_array("Products",$all_role)){ echo "checked"; } ?> >
                          <label for="Products" class="custom-control-label">Products</label>
                        </div>
                        
                      </div>
                  </div>
                  
                  

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" placeholder="Enter email..."  value="<?=$a->email;?>">
                    </div>
                  </div>

                  <!--<div class="form-group row">-->
                  <!--  <label  class="col-sm-2 col-form-label">Change Password</label>-->
                  <!--  <div class="col-sm-10">-->
                  <!--    <input type="text" class="form-control" name="password" placeholder="Enter password..." >-->
                  <!--  </div>-->
                  <!--</div>-->

              
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="form_data">Update</button>
                 
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