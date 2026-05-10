<?php require 'private/autoload.php';
$sqlforservices = 'SELECT * from services';
$statement = $con->prepare($sqlforservices);
$statement->execute();
$gerservices = $statement->fetchAll(PDO::FETCH_OBJ);

$slug=$_GET['slug'];
$sql = 'SELECT * from posts  where slug=:slug';
$statement = $con->prepare($sql);
$statement->execute(['slug'=>$_GET['slug']]);
$posts = $statement->fetchAll(PDO::FETCH_OBJ);
if(count($posts)>0){
    $p=$posts[0];
    
	$date=$p->date;
    $year = date('Y', strtotime($date));
    $day = date('j', strtotime($date));
    $month = date('F', strtotime($date));

	$ip_add=getUserIp();

	$getView="select * from views where ip_add=:ip_add AND post_id=:post_id";
	$stmview=$con->prepare($getView);
	$stmview->execute(['ip_add'=>$ip_add,'post_id'=>$p->post_id]);
	$views=$stmview->fetchAll(PDO::FETCH_OBJ);
	if(count($views)<1){
		$addviews = "INSERT INTO `views`(`ip_add`, `post_id`) VALUES (:ip_add,:post_id)";
        $stm = $con->prepare($addviews);
        $stm->execute(['ip_add'=>$ip_add,'post_id'=>$p->post_id]);

		$updatepost="update posts set views=views+1 where post_id=:post_id";
		$stmupdate = $con->prepare($updatepost);
        $stmupdate->execute(['post_id'=>$p->post_id]);

	}

}else{
    echo "<script>window.history.back();</script>";
}
?>
<!doctype html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$p->meta_description;?>">
    <meta name="keywords"
        content="ecommerce development, marketplace consultants, software consultants, mobile application consultants, seo, smm, web development, app development">

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
    <script data-ad-client="ca-pub-4392237665286076" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/meanmenu.css">

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="<?=$baseurl;?>assets/css/responsive.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F8L6JNQFV0"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-F8L6JNQFV0');
    </script>


    <title><?=$p->title;?></title>
</head>

<body>

    <!--<div class="preloader">-->
    <!--    <div class="d-table">-->
    <!--        <div class="d-table-cell">-->
    <!--            <div class="spinner"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->


    <div class="navbar-area">

        <div class="mobile-nav">
            <a href="<?=$baseurl;?>" class="logo">
                <img src="<?=$baseurl.$set->logo;?>" width="50px" alt="Hrdtech">
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
                                        <a href="<?=$set->facebook_url;?>" target="_blank">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$set->twitter_url;?>" target="_blank">
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$set->linkedin_url;?>" target="_blank">
                                            <i class='bx bxl-linkedin-square'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$set->instagram_url;?>" target="_blank">
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
                        <a class="navbar-brand" href="<?=$baseurl;?>">
                            <img src="<?=$baseurl.$set->logo;?>"  width="80px" alt="FirstMeta">
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
                               

                            </ul>


                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>



    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3><?=$p->title;?> </h3>
                <ul>
                    <li>
                        <a href="<?=$baseurl;?>">Home</a>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li><?=$p->title;?></li>
                </ul>
            </div>
        </div>
        <div class="inner-shape">
            <img src="assets/images/shape/inner-shape.png" alt="Images">
        </div>
    </div>


    <div class="blog-style-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <?php foreach($posts as $p):
							$date=$p->date;
							

							$year = date('Y', strtotime($date));
							
							$day = date('j', strtotime($date));
							
							$month = date('F', strtotime($date));

							date_default_timezone_set('Asia/Kolkata');
    
							$start_date = date('Y-m-d H:i:s');
							$start_date = new DateTime($start_date);
							$since_start = new DateTime($date);
							
							$interval = $since_start->diff($start_date);
							$diffInSeconds = $interval->s; //45
							$diffInMinutes = $interval->i; //23
							$diffInHours   = $interval->h; //8
							$diffInDays    = $interval->d; //21
							$diffInMonths  = $interval->m; //4
							$diffInYears   = $interval->y; //1
							
							if($diffInMinutes<60 && $diffInHours==0){
								$time=$diffInMinutes.' minutes ago'; 
							}else if($diffInHours<24 && $diffInDays==0){
								$time=$diffInHours.' hours ago'; 
							}else{
								$time=$diffInDays.' days ago'; 
							}
							
							$final_date= $month.' '.$day.', '.$year;
							?>
                        <div class="col-lg-12">
                            <div class="blog-style-card">
                                <div class="blog-style-img">

                                    <img src="<?=$baseurl.$p->image;?>" alt="Images">

                                    <div class="blog-style-tag">
                                        <h3><?=$day;?></h3>
                                        <span><?=$month;?></span>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><i class='bx bxs-user'></i>First Meta</li>
                                        <!--<li><i class='bx bx-show-alt'></i>322 View</li>-->

                                    </ul>
                                    <h3 class="mt-3"><?=$p->title;?></h3>


                                </div>
                                <p><?=$p->description;?></p>
                            </div>
                        </div>

                        <?php endforeach;?>





                        <!--<div class="col-lg-12 col-md-12 text-center">-->
                        <!--    <div class="pagination-area">-->
                        <!--        <a href="blog-1.html" class="prev page-numbers">-->
                        <!--            <i class='bx bx-left-arrow-alt'></i>-->
                        <!--        </a>-->
                        <!--        <span class="page-numbers current" aria-current="page">1</span>-->
                        <!--        <a href="blog-1.html" class="page-numbers">2</a>-->
                        <!--        <a href="blog-1.html" class="page-numbers">3</a>-->
                        <!--        <a href="blog-1.html" class="next page-numbers">-->
                        <!--            <i class='bx bx-right-arrow-alt'></i>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar-area">
                        <!--<div class="search-widget">-->
                        <!--    <form class="search-form">-->
                        <!--        <input type="search" class="form-control" placeholder="Search...">-->
                        <!--        <button type="submit">-->
                        <!--            <i class="bx bx-search"></i>-->
                        <!--        </button>-->
                        <!--    </form>-->
                        <!--</div>-->

                        <!--<div class="side-bar-widget">-->
                        <!--    <h3 class="title">Blog Categories</h3>-->
                        <!--    <div class="side-bar-categories">-->
                        <!--        <ul>-->
                        <!--            <li>-->
                        <!--                <div class="line-circle"></div>-->
                        <!--                <a href="#">IT Services<span>[70]</span></a>-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <div class="line-circle"></div>-->
                        <!--                <a href="#">Business<span>[24]</span></a>-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <div class="line-circle"></div>-->
                        <!--                <a href="#">Creative Invention<span>[08]</span></a>-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <div class="line-circle"></div>-->
                        <!--                <a href="#">Technology <span>[17]</span></a>-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <div class="line-circle"></div>-->
                        <!--                <a href="#">IT Consulting <span>[20]</span></a>-->
                        <!--            </li>-->
                        <!--            <li>-->
                        <!--                <div class="line-circle"></div>-->
                        <!--                <a href="#">Marketing Growth <span>[13]</span></a>-->
                        <!--            </li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="side-bar-widget">-->
                        <!--    <h3 class="title">Latest Blog</h3>-->
                        <!--    <div class="widget-popular-post">-->
                        <!--        <article class="item">-->
                        <!--            <a href="news-details.html" class="thumb">-->
                        <!--                <span class="full-image cover bg1" role="img"></span>-->
                        <!--            </a>-->
                        <!--            <div class="info">-->
                        <!--                <h4 class="title-text">-->
                        <!--                    <a href="news-details.html">-->
                        <!--                        10 Ways to Get Efficient Result & Benefits-->
                        <!--                    </a>-->
                        <!--                </h4>-->
                        <!--                <p>Nov 05, 2020</p>-->
                        <!--            </div>-->
                        <!--        </article>-->
                        <!--        <article class="item">-->
                        <!--            <a href="news-details.html" class="thumb">-->
                        <!--                <span class="full-image cover bg2" role="img"></span>-->
                        <!--            </a>-->
                        <!--            <div class="info">-->
                        <!--                <h4 class="title-text">-->
                        <!--                    <a href="news-details.html">-->
                        <!--                        New Device Invention for Digital Platform-->
                        <!--                    </a>-->
                        <!--                </h4>-->
                        <!--                <p>13 October, 2020</p>-->
                        <!--            </div>-->
                        <!--        </article>-->
                        <!--        <article class="item">-->
                        <!--            <a href="news-details.html" class="thumb">-->
                        <!--                <span class="full-image cover bg3" role="img"></span>-->
                        <!--            </a>-->
                        <!--            <div class="info">-->
                        <!--                <h4 class="title-text">-->
                        <!--                    <a href="news-details.html">-->
                        <!--                        Idea For New 5 App Design-->
                        <!--                    </a>-->
                        <!--                </h4>-->
                        <!--                <p>17 October, 2020</p>-->
                        <!--            </div>-->
                        <!--        </article>-->
                        <!--        <article class="item">-->
                        <!--            <a href="news-details.html" class="thumb">-->
                        <!--                <span class="full-image cover bg4" role="img"></span>-->
                        <!--            </a>-->
                        <!--            <div class="info">-->
                        <!--                <h4 class="title-text">-->
                        <!--                    <a href="news-details.html">-->
                        <!--                        Product Idea Solution For New Generation-->
                        <!--                    </a>-->
                        <!--                </h4>-->
                        <!--                <p>17 October, 2020</p>-->
                        <!--            </div>-->
                        <!--        </article>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="side-bar-widget">-->
                        <!--    <h3 class="title">Gallery</h3>-->
                        <!--    <ul class="blog-gallery">-->
                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <img src="assets/images/blog/blog-small-img1.jpg" alt="image">-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <img src="assets/images/blog/blog-small-img2.jpg" alt="image">-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <img src="assets/images/blog/blog-small-img3.jpg" alt="image">-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <img src="assets/images/blog/blog-small-img4.jpg" alt="image">-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <img src="assets/images/blog/blog-small-img5.jpg" alt="image">-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <img src="assets/images/blog/blog-small-img6.jpg" alt="image">-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->

                        <div class="side-bar-widget">
                            <h3 class="title">Our Services</h3>
                            <div class="side-bar-categories">
                                <ul>
                                    <?php foreach($gerservices as $ser):?>
                                    <li>
                                        <a href="<?=$baseurl;?>services" target="_blank">
                                            <i class='bx bx-chevron-right'></i> <?=$ser->title;?>
                                        </a>
                                    </li>
                                    <?php endforeach;?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'private/footer.php';?>