<?php
$home='active';
require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';

$servicesq='SELECT * FROM `services`';
$stmser = $con->prepare($servicesq);
$stmser->execute(['status'=>'Active']);
$services = $stmser->fetchAll(PDO::FETCH_OBJ);


$active_news='SELECT * FROM `posts` where status=:status';
$stm = $con->prepare($active_news);
$stm->execute(['status'=>'Active']);
$activenews = $stm->fetchAll(PDO::FETCH_OBJ);

$inactive_news='SELECT * FROM `posts` where status=:status';
$stmin = $con->prepare($inactive_news);
$stmin->execute(['status'=>'Inactive']);
$inactivenews = $stmin->fetchAll(PDO::FETCH_OBJ);

$teamsq='SELECT * FROM `team`';
$stmteam = $con->prepare($teamsq);
$stmteam->execute();
$team = $stmteam->fetchAll(PDO::FETCH_OBJ);

$jobsq='SELECT * FROM `jobs`';
$stmjb = $con->prepare($jobsq);
$stmjb->execute();
$applications = $stmin->fetchAll(PDO::FETCH_OBJ);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php if($user_data->type=='Admin') { ?>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h5><?=count($activenews);?></h5>

                <p>Active News</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper text-white"></i>
              </div>
              
            </div>
          </div>


          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h5><?=count($inactivenews);?></h5>

                <p>Inactive News </p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper text-white"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->


          
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5><?=count($services);?></h5>

                <p>Services</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper text-white"></i>
              </div>
              
            </div>
          </div>


          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h5><?=count($team);?></h5>

                <p>Team </p>
              </div>
              <div class="icon">
                <i class="fa fa-users text-white"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5><?=count($applications);?></h5>

                <p>Job Applications </p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase text-white"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <?php }else{ 
            if(in_array("Blogs",$role)){
          ?> 
          
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h5><?=count($activenews);?></h5>

                <p>Active News</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper text-white"></i>
              </div>
              
            </div>
          </div>


          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h5><?=count($inactivenews);?></h5>

                <p>Inactive News </p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper text-white"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          
          <?php }else if(in_array("Team",$role)){ ?>
          
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h5><?=count($team);?></h5>

                <p>Team </p>
              </div>
              <div class="icon">
                <i class="fa fa-users text-white"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          
          <?php } if(in_array("Services",$role)){ ?> 
          
              <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5><?=count($services);?></h5>

                <p>Services</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper text-white"></i>
              </div>
              
            </div>
          </div>

          
          <?php } if(in_array("Career",$role)){ ?> 
          
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5><?=count($applications);?></h5>

                <p>Job Applications </p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase text-white"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
            
          <?php } } ?>


       

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    


  </div>
<?php include 'private/footer.php';?>