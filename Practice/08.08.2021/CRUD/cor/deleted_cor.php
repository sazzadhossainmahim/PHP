<?php
include '../dbconfig.php';
$id=$_REQUEST['id']; 

$query="DELETE FROM `validation` WHERE id=$id ";

$run_Query = mysqli_query ($connect , $query);
if ($run_Query == true) {
	  header("location:../index.php?deleted");
           exit();
}
  else{
      	header("location:../index.php?not_deleted");

      }


?>