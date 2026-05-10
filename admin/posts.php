<?php
if(isset($_GET['status'])){
  if($_GET['status']=='Active'){
    $activeposts='active';
  }else{
    $inactiveposts='active';
  }

require 'private/autoload.php';
require 'private/header.php';
require 'private/sidebar.php';

    $sql = 'SELECT * from posts where status=:status ORDER BY id desc;';
    $statement = $con->prepare($sql);
    $statement->execute(['status'=>$_GET['status']]);
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);
    $sno=1;
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All <?=$_GET['status'];?> Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=$baseurl;?>admin/">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
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
                    <th>Title</th>
                    
                    <th>Status</th>
                    <th>Views</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($posts as $p):
                     
                     ?>
                  <tr>
                    <td><?=$sno;?></td>
                    <td><?=$p->title;?></td>
                    
                    <td><a href="status?id=<?=$p->id;?>&status=<?=$p->status;?>&post_type=news" class="badge badge-<?php if($p->status=='Active'){ echo 'success';}else{ echo 'danger';}?>"><?=$p->status;?></a></td>
                    <td><?=$p->views;?></td>
                    <td><?=$p->date;?></td>
                    <td>
                      
                       <a href="post?id=<?=$p->id;?>" class="badge badge-warning">View</a>
                      <a href="edit-post?post_id=<?=$p->post_id;?>" class="badge badge-primary">Edit</a>
                      <a href="delete?id=<?=$p->id;?>&type=Post" class="badge badge-danger" onclick="return confirm('Do you want to delete?');">Delete</a>

                     
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
    <!-- /.content -->

  </div>
<?php include 'private/footer.php';
}?>