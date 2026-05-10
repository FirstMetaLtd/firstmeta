<?php 
 $sql = 'SELECT * from general_settings where id=1 limit 1';
    $statement = $con->prepare($sql);
    $statement->execute();
    $set = $statement->fetchAll(PDO::FETCH_OBJ);
    if(count($set)==1){
        $set=$set[0];

    }
    $role=explode(',',$user_data->role);
    
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="home" class="brand-link text-center">
     <img src="<?=$baseurl.$set->logo;?>" style="width:50px;" alt=""
                                                class="logo"> 
    
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home" class="nav-link <?php if(isset($home)){echo $home;}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        

            <?php if($user_data->type=='Admin') { ?>

        
               <li class="nav-item">
                <a href="add-post" class="nav-link <?php if(isset($addpost)){echo $addpost;}?>">
                  <i class="fa fa-newspaper nav-icon"></i>
                  <p>Add new post</p>
                </a>
              </li>

              
             <li class="nav-item">
                <a href="posts?status=Active" class="nav-link <?php if(isset($activeposts)){echo $activeposts;}?>">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Active Posts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="posts?status=Inactive" class="nav-link <?php if(isset($inactiveposts)){echo $inactiveposts;}?>">
                  <i class="fa fa-times nav-icon"></i>
                  <p>Inactive Posts</p>
                </a>
              </li>


          <li class="nav-item">
            <a href="team" class="nav-link <?php if(isset($team)){echo $team;}?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Team
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="services" class="nav-link <?php if(isset($service)){echo $service;}?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Services
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logos" class="nav-link <?php if(isset($logos)){echo $logos;}?>">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Technology Logo
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="products" class="nav-link <?php if(isset($products)){echo $products;}?>">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Products
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="add-job" class="nav-link <?php if(isset($job)){echo $job;}?>">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Add Jobs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="applications" class="nav-link <?php if(isset($applications)){echo $applications;}?>">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Job Applications
              </p>
            </a>
          </li>

          
      

          <li class="nav-item">
            <a href="enquiries" class="nav-link <?php if(isset($contact)){echo $contact;}?>">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Contact Enquiries
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="settings" class="nav-link <?php if(isset($settings)){echo $settings;}?>">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                General Settings
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="add-admin" class="nav-link <?php if(isset($admins)){echo $admins;}?>">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Create Subadmins
              </p>
            </a>
          </li>
          <?php }
          else{
          if(in_array("Blogs",$role)){
          ?>
          
            <li class="nav-item">
                <a href="add-post" class="nav-link <?php if(isset($addpost)){echo $addpost;}?>">
                  <i class="fa fa-newspaper nav-icon"></i>
                  <p>Add new post</p>
                </a>
              </li>

              
             <li class="nav-item">
                <a href="posts?status=Active" class="nav-link <?php if(isset($activeposts)){echo $activeposts;}?>">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Active Posts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="posts?status=Inactive" class="nav-link <?php if(isset($inactiveposts)){echo $inactiveposts;}?>">
                  <i class="fa fa-times nav-icon"></i>
                  <p>Inactive Posts</p>
                </a>
              </li>

          
         <?php }
         if(in_array("Products",$role)){ ?>
         <li class="nav-item">
            <a href="products" class="nav-link <?php if(isset($products)){echo $products;}?>">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Products
              </p>
            </a>
          </li>
             <?php 
         }
          if(in_array("Team",$role)){ ?> 
          <li class="nav-item">
            <a href="team" class="nav-link <?php if(isset($team)){echo $team;}?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Team
              </p>
            </a>
          </li>

         
         <?php }
          if(in_array("Services",$role)){ ?> 
         <li class="nav-item">
            <a href="services" class="nav-link <?php if(isset($service)){echo $service;}?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          
          <?php }
           if(in_array("Career",$role)){ ?> 
         <li class="nav-item">
            <a href="add-job" class="nav-link <?php if(isset($job)){echo $job;}?>">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Add Jobs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="applications" class="nav-link <?php if(isset($applications)){echo $applications;}?>">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Job Applications
              </p>
            </a>
          </li>
         <?php  } } ?>
           <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fa fa-sign"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
