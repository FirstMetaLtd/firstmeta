<?php
$team='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';
    $sql = 'SELECT * from team ORDER BY id desc;';
    $statement = $con->prepare($sql);
    $statement->execute();
    $teams = $statement->fetchAll(PDO::FETCH_OBJ);
    $sno=1;
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Team Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=$baseurl;?>admin/">Home</a></li>
              <li class="breadcrumb-item active">Team</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token'] && isset($_POST['form_data'])){

    extract($_POST);
    $filename = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];

    $filesize=$file_size/1024;
    if($filesize<500){
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    
   
        if($error == ''){


            $tempname = $_FILES['image']['tmp_name'];
            $insertfile = "img/".date('Ymd')."teammember".date('His').".".$ext ;
            move_uploaded_file($tempname,"../".$insertfile);

        
            $arr['designation']=$designation;
            $arr['name']=$name;
            $arr['qualification']='';
            $arr['exp']=$exp;
            $arr['image']=$insertfile;
           
                  $addcity = "insert into team (name,designation,image,exp,qualification) values(:name,:designation,:image,:exp,:qualification)";
                  $stm = $con->prepare($addcity);
                  if($stm->execute($arr)){
                      echo "<script>
                                  window.location = 'team';</script>";
                  }
        }

      }else{
        echo "<script>swal('Error!', 'File size must be less than 500kb', 'error').then(function() {
                            window.history.back();
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
                    <label  class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name"  placeholder="Enter here..." required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="designation"  placeholder="Enter here..." required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" >Profile Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="exp"  placeholder="Enter here..." required>
                    </div>
                  </div>

                  <!--<div class="form-group row">-->
                  <!--  <label  class="col-sm-2 col-form-label">Qualification</label>-->
                  <!--  <div class="col-sm-10">-->
                  <!--    <input type="text" class="form-control" name="qualification"  placeholder="Enter here..." required>-->
                  <!--  </div>-->
                  <!--</div>-->

                  
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

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="col-12">
             <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S No</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($teams as $p):?>
                  <tr>
                    <td><?=$sno;?></td>
                    <td><?=$p->name;?></td>
                    <td><?=$p->designation;?></td>
                    <td><a href="<?=$baseurl.$p->image;?>" target="_blank"><img src="<?=$baseurl.$p->image;?>" width="100px"></a></td>
                    <td>
                    <a href="edit-team?id=<?=$p->id;?>" class="badge badge-warning">Edit</a>
                      <a href="delete?id=<?=$p->id;?>&type=Team" class="badge badge-danger" onclick="return confirm('Do you want to delete?');">Delete</a>

                     
                    </td>
                  </tr>
                  <?php $sno++; endforeach; ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           </div>
        </div> <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
<?php include 'private/footer.php';?>