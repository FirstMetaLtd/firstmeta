<?php require 'private/autoload.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FirstMeta Admin -  Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login"><b>First</b>Meta</a>
   
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>
<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']){
    $email = $_POST['email'];
    if(!preg_match('/^[\w\-]+@[\w\-]+.[\w\-]+$/', $email)){
         echo "<script>swal('Error!', 'Please enter a valid email.', 'error').then(function() {
                                window.location = 'login';
                            })</script>";
    }else{
            $password=$_POST['password'];
            $arr['email']=$email;

            $query = "select * from admin where email = :email limit 1";
            $stm = $con->prepare($query);
            $check = $stm->execute(['email'=>$email]);
            if(($check)){
                $data = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data)>0){
                $data = $data[0];
                $pass = $data->password;
                $pass_decode=password_verify($password,$pass);
                    if($pass_decode){
                        $_SESSION['admin_url'] = $data->admin_url;
                        echo "<script>swal('Success!', 'You are successfully logged in.', 'success').then(function() {
                                window.location = 'home';
                            })</script>";
                    }else{
                        echo "<script>swal('Error!', 'Password does not match.', 'error').then(function() {
                                window.location = 'login';
                            })</script>";
                    }
                }else{
                     echo "<script>swal('Error!', 'User does not exists.', 'error').then(function() {
                                window.location = 'login';
                            })</script>";
                }
            }
}

}
$_SESSION['token'] = get_random_string(60);
?>  
      <form  method="post">
        <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email"   required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password"   required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    

    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

</html>
