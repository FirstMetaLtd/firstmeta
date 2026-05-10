<?php require('private/header.php');?>
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Contact Us</h3>
                <ul>
                    <li>
                        <a href="home">Home</a>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <div class="inner-shape">
            <img src="assets/images/shape/inner-shape.png" alt="Images">
        </div>
    </div>


    <div class="contact-form-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Let's Send Us a Message Below</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4">
                    <div class="contact-info mr-20">
                        <span>Contact Info</span>
                        <h2>Let's Connect With Us</h2>
                        <p>Jump-start your business with expert software engineering teams.</p>
                        <ul>
                            <li>
                                <div class="content">
                                    <i class='bx bx-phone-call'></i>
                                    <h3>Phone Number</h3>
                                    <a href="tel:<?=$set->phone;?>"><?=$set->phone;?></a>
                                </div>
                            </li>
                          
                            <li>
                                <div class="content">
                                    <i class='bx bx-message'></i>
                                    <h3>Contact Info</h3>
                                    <span><?=$set->email;?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="contact-form">
<?php

if(isset($_POST['token']) && isset($_POST['contact'])){
    
    extract($_POST);
    
    $email = $_POST['email'];
    
       
        if($error == ''){
            $arr['name']=$_POST['name'];
            $arr['email']=$_POST['email'];
            $arr['subject']=$_POST['subject'];
            $arr['phone']=$_POST['phone'];
            $arr['message']=addslashes($_POST['message']);
            
            $query="INSERT INTO `contact` (`name`, `email`, `phone`, `subject`, `message`) VALUES (:name,:email,:phone,:subject,:message)";
            $stm = $con->prepare($query);
            if($stm->execute($arr)){
    

                  $fromemail=$email;
                  $email_to="firstmetaltd@gmail.com";
                  $sub="Contact Enquiry : FirstMeta";
                  $headers= "From:  FirstMeta <".$fromemail.">";
                  $msg = "Hello FirstMeta,\nNew Contact Enquiry:\nName:$name\nEmail:$email\nSubject:$subject\nMessage:$message\nPhone:$phone";
                  if(mail($email_to,$sub,$msg,$headers)){
                    echo "<script>swal('Success!', 'Your response submitted. We will get back to you soon.', 'success').then(function() {
                    
                            window.location = 'home';
                        })</script>";
                  }
            }
        }

}
$_SESSION['token'] = bin2hex(random_bytes(15)); 
?> 
                        <form method="POST">
                            <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text" name="name"  class="form-control" required
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Email <span>*</span></label>
                                        <input type="email" name="email"  class="form-control" required
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input type="text" name="phone"  required
                                            class="form-control"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Subject <span>*</span></label>
                                        <input type="text" name="subject"  class="form-control"
                                            required  placeholder="Your Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Your Message <span>*</span></label>
                                        <textarea name="message" class="form-control" cols="30" rows="8"
                                            required 
                                            placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12 col-md-12">
                                    <div class="agree-label">
                                        <input type="checkbox" id="chb1">
                                        <label for="chb1">
                                            Accept <a href="terms-condition.html">Terms & Conditions</a> And <a
                                                href="privacy-policy.html">Privacy Policy.</a>
                                        </label>
                                    </div>
                                </div> -->
                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" name="contact" class="default-btn btn-bg-two border-radius-50">
                                        Send Message <i class='bx bx-chevron-right'></i>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php require 'private/footer.php';?> 