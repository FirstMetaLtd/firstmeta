<?php 
require('private/database.php');
if(isset($_GET['type']) && isset($_GET['id'])){
    $type=$_GET['type'];
    $id=$_GET['id'];
    
    if($type=='Ads'){
       $delete = "DELETE FROM `advertisment` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }else if($type=='Post'){
        $delete = "DELETE FROM `posts` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }else if($type=='Category'){
        $deletepos = "DELETE FROM `posts` WHERE  cat_id=:id";
            $stmp = $con->prepare($deletepos);
            if($stmp->execute(['id'=>$id])){
                    $delete = "DELETE FROM `category` WHERE  id=:id";
                    $stm = $con->prepare($delete);
                    if($stm->execute(['id'=>$id])){
                        echo "<script>window.history.back();</script>";
                    }
            }
            
       
    }
    else if($type=='Ad'){
        $delete = "DELETE FROM `advertisment` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }
    else if($type=='Team'){
        $delete = "DELETE FROM `team` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }
    else if($type=='Service'){
        $delete = "DELETE FROM `services` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }
    else if($type=='Job'){
        $delete = "DELETE FROM `jobs` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }
    else if($type=='Product'){
        $delete = "DELETE FROM `products` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }

    else if($type=='Admin'){
        $delete = "DELETE FROM `admin` WHERE  id=:id";
            $stm = $con->prepare($delete);
            if($stm->execute(['id'=>$id])){
                echo "<script>window.history.back();</script>";
            }
    }
    
    
        
}
?>