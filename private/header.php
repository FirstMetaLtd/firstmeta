<?php require 'private/autoload.php';
$sqlforservices = 'SELECT * from services';
$statement = $con->prepare($sqlforservices);
$statement->execute();
$gerservices = $statement->fetchAll(PDO::FETCH_OBJ);


$sqlforproduct = 'SELECT * from products';
$statesment = $con->prepare($sqlforproduct);
$statesment->execute();
$getproducts = $statesment->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FirstMeta provides Software development , Website Development , App Development, Web Designing, Interactive Web Design , MLM Software">
    <meta name="keywords" content="ecommerce development, marketplace consultants, software consultants, mobile application consultants, seo, smm, web development, app development">
    
    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/bootstrap.min.css">
    
    <link rel="icon" type="image/jpeg" href="<?=$baseurl;?>img/fav.png">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/animate.min.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/fonts/flaticon.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/nice-select.min.css">
    <script data-ad-client="ca-pub-4392237665286076" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/meanmenu.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/style.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/responsive.css">
   
    <title><?=$set->site_title;?></title>
</head>

<body>

    <!-- <div class="preloader">
       <div class="d-table">
           <div class="d-table-cell">
               <div class="spinner"></div>
           </div>
       </div>
    </div> -->


    <div class="navbar-area">

        <div class="mobile-nav">
            <a href="<?=$baseurl;?>" class="logo">
                <img src="<?=$baseurl.$set->logo;?>" width="50px"  alt="First Meta"> 
            </a>
        </div>


    <header class="top-header top-header-bg">
        <div class="container-fluid">
            <div class="container-max">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="top-head-left">
                            <div class="top-contact">
                                <h3>Support : <a href="tel:<?=$set->phone;?>"><?=$set->phone;?></a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="top-header-right">
                            <div class="top-header-social">
                                <ul>
                                    <li>
                                        <a href="<?=$set->facebook_url;?>" >
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$set->twitter_url;?>" >
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$set->linkedin_url;?>" >
                                            <i class='bx bxl-linkedin-square'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$set->instagram_url;?>">
                                            <i class='bx bxl-instagram'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


        <div class="main-nav">
            <div class="container-fluid">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="navbar-brand" href="<?=$baseurl;?>" >
                             <img src="<?=$baseurl.$set->logo;?>" width="80px"  alt="First Meta"> 
                            <!--<h4 style="font-family:Monospace">Hrdtech</h4>-->
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                               <li class="nav-item">
                                    <a href="<?=$baseurl;?>" class="nav-link">
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=$baseurl;?>products" class="nav-link">
                                      Our Products
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=$baseurl;?>services" class="nav-link">
                                       Our Services
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=$baseurl;?>team" class="nav-link">
                                        Our Team
                                    </a>
                                </li>

                                  <li class="nav-item">
                                    <a href="<?=$baseurl;?>about" class="nav-link">
                                        About Us
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=$baseurl;?>career" class="nav-link">
                                        Career
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=$baseurl;?>blogs" class="nav-link">
                                        Blogs
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=$baseurl;?>contact" class="nav-link">
                                        Contact Us
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="https://wa.me/+2347065546527?text=Hello , How are you?" target="_blank">
                                        <i class="fa fa-whatsapp" style="color:green;font-size:30px"></i> Whatsapp us
                                    </a>
                                </li>

                            </ul>

                           
                          
                        </div>
                    </nav>
                </div>
            </div>
        </div>
       
    </div>

