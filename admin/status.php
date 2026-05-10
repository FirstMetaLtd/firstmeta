<?php 
require('private/database.php');
if(isset($_GET['id']) && isset($_GET['status']) && isset($_GET['post_type'])){
	$id=$_GET['id'];
	$status=$_GET['status'];
	$post_type=$_GET['post_type'];
	if($status=='Active'){
	    $status='Inactive';
	}else{
	    $status='Active';
	}
	
	   
	        $updstatus = "update posts set status=:status where id=:id";
            $stm = $con->prepare($updstatus);
            if($stm->execute(['status'=>$status,'id'=>$id])){
               echo "<script>window.history.back();</script>";
       		}
}
?>