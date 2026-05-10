<?php require 'private/header.php';?> 
<div class="banner-area">
        <div class="container-fluid">
            <div class="container-max">
                <div class="banner-item-content banner-item-ptb">
                    <h1>We Provide Best IT Services for Your Need</h1>
                    <p>We are a reputed Web Design and Development, Software Development, and Mobile App Development Company in Nigeria that can help you define your brand and increase your products or services demand through a customer-centric and data-driven approach. We understand the importance of an attractive website in today's digital age and be sure to incorporate all aspects of digital marketing such as SEO, PPC, content marketing, and more to achieve outstanding results.<br>
As a software development company, FirstMeta helps small businesses and visionaries to turn their bold ideas into launched products. A combination of our clients’ vision, our technology expertise and transparent development process is the way that we empower our clients to stay ahead of the competition.


                    </p>
                    <div class="banner-btn">
                        <a href="about" class="default-btn btn-bg-two border-radius-50">Learn More <i class='bx bx-chevron-right'></i></a>
                        <a href="contact" class="default-btn btn-bg-one border-radius-50 ml-20">Get A Quote <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="work-process-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Our Products</span>
                <!--<h2>How Our Services Will Help You to Grow Your Business</h2>-->
            </div>
              <div class="row pt-45">

                <?php foreach($getproducts as $p):?>
                <div class="col-lg-6 col-sm-12">
                    <div class="services-card services-style-bg">

                        <h3><a href="product/<?=$p->slug;?>"><?=$p->title;?> </a></h3>
                        <p><?=$p->short_desc;?></p>
                        
                    </div>
                </div>
                <?php endforeach;?>
               
            </div>
        </div>
    </section>


    <div class="about-area about-bg pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-2">
                        <img src="assets/images/about/about-img3.jpg" alt="Hrdtech | Web Development | App Development | Digital Marketing">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-2 ml-20">
                        <div class="section-title">
                            <span class="sp-color1">About Us</span>
                            <h2>Right Partner for Software Innovation</h2>
                            <p>
                            FirstMeta Ltd (RC:1933162) is a Limited Liability Company registered in Nigeria.<br><br>
As a software development company, FirstMeta helps small businesses and visionaries to turn their bold ideas into launched products. A combination of our clients’ vision, our technology expertise and transparent development process is the way that we empower our clients to stay ahead of the competition.<br><br>
Whether you want to create a product from scratch or add new functionality to an existing application, FirstMeta software developers will find the best-case scenario to meet your business needs and keep your project within budget.

                            </p>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="about-card">
                                    <div class="content">
                                        <i class="flaticon-practice"></i>
                                        <h3>Experience</h3>
                                    </div>
                                    <p>We have 3+ years experience . We developed many ecommerce , dynamic , static websites and mobile applications.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="about-card">
                                    <div class="content">
                                        <i class="flaticon-help"></i>
                                        <h3>Quick Support</h3>
                                    </div>
                                    <p>We provide best support to our clients.</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section class="technology-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Our Technology Stack</span>
                <h6>Selecting the right tech stack is a real challenge but our team of professional web developers will help you choose the right tools for delivering a top-notch web application with all the functionality you need.</h6>
            </div>
            <div class="row pt-45">
                <?php 
                $sqlforlogos = 'SELECT * from technology';
                $stat = $con->prepare($sqlforlogos);
                $stat->execute();
                $logos = $stat->fetchAll(PDO::FETCH_OBJ);
                foreach($logos as $p):
                $images = explode(',',$p->image);
                for($i=0;$i<count($images)-1;$i++){
                ?>
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color">
                        <img src="<?=$baseurl.$images[$i];?>" height="50px">
                    </div>
                </div>
                <?php } endforeach; ?>

            </div>
        </div>
    </section>




<?php require 'private/footer.php';?>