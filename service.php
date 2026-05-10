<?php 
require 'private/header.php';

$slug=$_GET['slug'];
$sql = 'SELECT * from services  where slug=:slug';
$statement = $con->prepare($sql);
$statement->execute(['slug'=>$_GET['slug']]);
$posts = $statement->fetchAll(PDO::FETCH_OBJ);
if(count($posts)>0){
    $p=$posts[0];
}
?> 


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
                <div class="col-lg-12">
                    <div class="row">
                        
                         
                        <div class="col-lg-4">
                            <div class="blog-style-card">
                                <div class="blog-style-img">
                                        <img src="<?=$baseurl.$p->image;?>">
                                </div>
                                
                            </div>
                        </div>
                        
                    <div class="col-lg-8">
                            
                                <div class="content">
                                   
                                    <h3 class="mt-3"><?=$p->title;?></h3>
                                    
                                   
                                </div>
                                <p><?=$p->description;?></p>
                            
                        </div>
                        
                       
                    </div>
                </div>
               
            </div>
        </div>
    </div>

<?php require 'private/footer.php';?> 