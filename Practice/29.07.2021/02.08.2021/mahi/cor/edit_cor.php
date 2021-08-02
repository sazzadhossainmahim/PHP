<?php
include '../dbconfig.php';
    $id = $_REQUEST['id'];
     $lang = $_REQUEST['lang'];
   
  
    $mobile_variable = $_REQUEST['mobile'];
    $gender = $_REQUEST['gender'];
     
 

    
   
    
    if (empty($mobile_variable)) {
          header("location:../index.php?not_done");
        exit();
        
    } else if (!is_numeric($mobile_variable)) {
          header("location:../index.php?edit_number");
        exit();
       
    }
    $lenth = strlen($mobile_variable);
    
     if ( $lenth != 11) {
        header("location:../index.php?edit_mnmb11");
        exit();
    }
   
 

     
            $insertQuere = "UPDATE `validation` SET `mobile`='$mobile_variable',`gender`='$gender' , `lang`='$lang' WHERE id=$id";
          $run_Query = mysqli_query ($connect , $insertQuere);
              if ($run_Query == true) {

    
              header("location:../index.php?UPDATE");
           
      }
      else{
      	header("location:../index.php?not_UPDATE");

      }




?>