<?php require 'private/header.php';
?>

<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Our Services</h3>
            <h5 class="text-white">We Provide a Wide Variety of IT Services</h5>
            <h4 class="text-white">An Autonomous Expert Team That Delivers Technology Solutions and Value</h4>
        </div>
    </div>
    <div class="inner-shape">
        <img src="assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>


<section class="services-style-area  pb-70">
        <div class="container">
           
            <div class="row pt-45">
            <?php foreach($gerservices as $p):?>
                <div class="col-lg-4 col-sm-12">
                    <div class="services-card services-style-bg">

                        <h3><a href="<?=$baseurl.'service/'.$p->slug;?>"><?=$p->title;?></a></h3>
                        <p><?=substr($p->short_desc,0,150).'...';?></p>

                    </div>
                </div>
            <?php endforeach;?>
               
            </div>
        </div>
    </section>



<?php require 'private/footer.php';?>