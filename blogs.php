<?php require 'private/header.php';
$sql = 'SELECT * from posts  where post_for=:post_for AND status=:status ORDER BY id desc;';
	$statement = $con->prepare($sql);
	$statement->execute(['status'=>'Active','post_for'=>'Normal']);
	$posts = $statement->fetchAll(PDO::FETCH_OBJ);

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4509296207410158"
     crossorigin="anonymous"></script>
<!-- FirstMeta -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4509296207410158"
     data-ad-slot="8448390210"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

    if(count($posts)<1){
        echo "<script>window.history.back();</script>";
    }
?> 

    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Blogs </h3>
                <ul>
                    <li>
                        <a href="<?=$baseurl;?>">Home</a>
                    </li>
                    <li>
                        <i class='bx bx-chevrons-right'></i>
                    </li>
                    <li>Blogs</li>
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
                                    <a href="<?=$baseurl.'blog/'.$p->slug;?>">
                                        <img src="<?=$baseurl.$p->image;?>" alt="Images">
                                    </a>
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
                                    <h3><a href="<?=$baseurl.'blog/'.$p->slug;?>"><?=$p->title;?></a>
                                    </h3>
                                    <p><?=$p->short_desc;?></p>
                                    <a href="<?=$baseurl.'blog/'.$p->slug;?>" class="default-btn btn-bg-two border-radius-50">Read
                                        More <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <?php endforeach;?>
							
						
                        
            
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar-area">
                        
                        
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
                        <!--</div> -->
                        
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