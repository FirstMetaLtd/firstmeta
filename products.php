<?php require 'private/header.php';?>

<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Our Products</h3>

        </div>
    </div>
    <div class="inner-shape">
        <img src="assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>


<section class="services-style-area  pb-70">
        <div class="container">
           
            <div class="row pt-45">
            <?php foreach($getproducts as $p):?>
                <div class="col-lg-12 col-sm-12">
                    <div class="services-card services-style-bg">

                        <h3><a href="product/<?=$p->slug;?>"><?=$p->title;?> </a></h3>
                        <p><?=$p->short_desc;?></p>
                        
                    </div>
                </div>
                <?php endforeach;?>

              
               
            </div>
        </div>
    </section>



<?php require 'private/footer.php';?>