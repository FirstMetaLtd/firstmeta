<?php require 'private/header.php';
$sqlforjobs = 'SELECT * from jobs order by id desc';
$stmjobs = $con->prepare($sqlforjobs);
$stmjobs->execute();
$getjobs = $stmjobs->fetchAll(PDO::FETCH_OBJ);
?>

<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Career</h3>
            <h5 class="text-white">FirstMeta offers sophisticated work to extraordinary people. We always welcome agile and innovative-minded people! Shape your skills, develop your career, expand your knowledge and gain trust by joining our team!
</h5>
           
        </div>
    </div>
    <div class="inner-shape">
        <img src="assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>


<section class="services-style-area  pb-70">
        <div class="container">
           
            <div class="row pt-45">
            <?php foreach($getjobs as $p):?>
                <div class="col-lg-4 col-sm-12">
                    <div class="services-card services-style-bg">
                    <img src="<?=$baseurl.$p->icon;?>" width="50px" height="50px">
                        <h3><a href="apply/<?=$p->slug;?>"><?=$p->title;?></a></h3>
                        <a href="apply/<?=$p->slug;?>" class="btn btn-light">Apply now</a>
                    </div>
                </div>
            <?php endforeach;?>
               
            </div>
        </div>
    </section>



<?php require 'private/footer.php';?>