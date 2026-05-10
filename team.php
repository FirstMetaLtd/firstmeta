<?php require 'private/header.php';
$sql = 'SELECT * from team ORDER BY id desc;';
    $statement = $con->prepare($sql);
    $statement->execute();
    $teams = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h4 class="text-white">Great builds come from organized teams that are responsible for themselves.</h4>
            <p class="text-white">Our development teams are self-organized and self-propelling. While we work collaboratively with the client, we are extremely independent and self-reliant individuals. Because we set our deadlines and project outlines, as a software development team, we can organize projects on our own.</p>
        </div>
    </div>
    <div class="inner-shape">
        <img src="assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>


<div class="team-area pt-50 pb-70">
    <div class="container">

        <div class="row pt-45">
             <?php foreach($teams as $p):?>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <img src="<?=$baseurl.$p->image;?>" alt="Team Images" style="width:100%;height:400px">

                    <div class="content">
                        <h3><?=$p->name;?></h3>
                        <span><?=$p->designation;?></span>
                        <p class="text-white" style="font-size:10px;"><?=$p->exp;?><br><?=$p->qualification;?></p>
                    </div>
                </div>
            </div>
            
            <?php endforeach; ?>

        </div>
    </div>
</div>


<?php require 'private/footer.php';?>