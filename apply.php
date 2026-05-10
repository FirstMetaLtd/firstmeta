<?php 

require 'private/header.php';

$sqlforjobs = 'SELECT * from jobs where slug=:slug';
$stmjobs = $con->prepare($sqlforjobs);
$stmjobs->execute(['slug'=>$_GET['job']]);
$getjobs = $stmjobs->fetchAll(PDO::FETCH_OBJ);
if(count($getjobs)<1){
    echo "<script>window.location='home'</script>";
}else{
    $job=$getjobs[0];
}
?>

<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3><?=$job->title;?></h3>

        </div>
    </div>
    <div class="inner-shape">
        <img src="<?=$baseurl;?>assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>

<?php 
$error='';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token'] && isset($_POST['form_data'])){
  
  $filename = $_FILES['resume']['name'];
  if($filename!=''){
  
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filedate= date('Ymd')."resume".date('His');
    $insertfile = "resumes/".$filedate.".".$ext ;
    move_uploaded_file($_FILES["resume"]["tmp_name"], $insertfile);

  }else{
    $insertfile='NA';
  }
    date_default_timezone_set('Asia/Kolkata');
    $todaydate =  date('d/m/y');

    extract($_POST);
    
 
        if($error == ''){
            $arr['title']=$title;
            $arr['date']=$todaydate;
            $arr['resume']=$insertfile;
            $arr['name']=$name;
            $arr['email']=$email;
            $arr['phone']=$phone;
            $arr['message']=$message;

                  $addcity = "INSERT INTO `applications` (`title`, `name`, `email`, `phone`, `message`, `resume`, `date`) 
                                VALUES (:title,:name,:email,:phone,:message,:resume,:date)";
                  $stm = $con->prepare($addcity);
                  if($stm->execute($arr)){
                      $email_to=$email;
                      $fromemail="FirstMetaLtd@gmail.com";
                      
                      $email_to_admin="FirstMetaLtd@gmail.com";
                      $from_user=$email;
                      $adm_sub="Career Application : FirstMeta";
                      $sub="Thank you for applying to FirstMeta";
                      $headers= "From:  FirstMeta <".$fromemail.">";
                      $msg = "$name, we’ve got your application, and we’ll get back to you soon if your skills and experience are a good match for the $title role.\n\nTeam\nFirstMeta";
                      
                      $adm_msg="Hello FirstMeta, You have an application regarding $title role.Please check your admin panel for details.";
                      if(mail($email_to,$sub,$msg,$headers)){
                        mail($email_to_admin,$adm_sub,$adm_msg,$headers);   
                      }
                      
                     
                       echo "<script>swal('Success!', 'Your application is submitted.', 'success').then(function() {
                    
                            window.location = '{$baseurl}';
                        })</script>";
                    
                  }
        }
}
    $_SESSION['token'] = get_random_string(60);
    ?>


<section class="services-style-area  pb-70">
    <div class="container">

        <div class="row pt-45">

            <div class="col-lg-6 col-sm-12">
                <p><?=$job->description;?>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="contact-form">
                    <form method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                        <div class="row">

                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Position applied for</label>
                                    <input type="text" name="title" readonly class="form-control" value="<?=$job->title;?>">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" required placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email Id <span>*</span></label>
                                    <input type="email" name="email" class="form-control" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Mobile Number <span>*</span></label>
                                    <input type="text" name="phone" required class="form-control"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label> Message <span>*</span></label>
                                    <textarea name="message" class="form-control" rows="3" required
                                        placeholder="Message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Upload your resume <span>*</span></label>
                                    <input type="file" name="resume" required class="form-control" >
                                </div>
                                
                            </div>

                            
                            <div class="col-lg-12 col-md-12 text-center">
                                <button type="submit" name="form_data" class="default-btn btn-bg-two border-radius-50">
                                    Submit <i class='bx bx-chevron-right'></i>
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>



<?php require 'private/footer.php';?>