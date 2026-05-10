<?php
$category='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';
$sql = 'SELECT * from category where id=:id';
    $statement = $con->prepare($sql);
    $statement->execute(['id'=>$_GET['id']]);
    $cat = $statement->fetchAll(PDO::FETCH_OBJ);
    if(count($cat)>0){
        $cat=$cat[0];
    }else{
        echo "<script>window.history.back();</script>";
    }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token'] && isset($_POST['form_data'])){
  extract($_POST);
   
        if($error == ''){

            $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($name)));
            $arr['name']=esc($name);
            $arr['slug']=$slug;
            $arr['id']=$_GET['id'];
            
            $addpackages = "update category set name=:name , slug=:slug where id=:id";
            $stm = $con->prepare($addpackages);
            if($stm->execute($arr)){
                      echo "<script>swal('Success!', 'Category Updated successfully.', 'success').then(function() {
                                  window.location = 'category';
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
                    <label  class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value=<?=$cat->name;?>   required>
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