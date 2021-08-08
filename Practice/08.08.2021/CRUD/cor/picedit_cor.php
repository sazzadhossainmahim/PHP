<?php
include '../dbconfig.php';
         
      $id = $_REQUEST['id'];
      
      $photo = $_FILES["photo"] ;
       $filename = $photo["name"] ;

    $filepath = $photo["tmp_name"] ;
   $fileerror = $photo["error"] ;

   if ($fileerror == 0) {
    $desnfile = 'uplod/'.$filename;
    move_uploaded_file($filepath, $desnfile);

   }

            $insertQuere = "UPDATE `validation` SET `image`='$filename' WHERE id=$id";
           $run_Query = mysqli_query ($connect , $insertQuere);
              if ($run_Query == true) {

    
              header("location:../index.php?UPDATE");
           
      }
      else{
        header("location:../index.php?not_UPDATE");

      }




?>