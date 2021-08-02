<?php
include '../dbconfig.php';
      $lang = $_REQUEST['lang'];
      $chkarry = implode(' , ' ,  $lang);
    

      $mobile_variable = $_REQUEST['mobile'];
      $gender = $_REQUEST['gender'];
      $photo = $_FILES["photo"] ;
        $filename = $photo["name"] ;
    $filepath = $photo["tmp_name"] ;
   $fileerror = $photo["error"] ;

   if ($fileerror == 0) {
    $desnfile = 'uplod/'.$filename;
    move_uploaded_file($filepath, $desnfile);
  
    

     
   }
   
 

    // --------------Mobile Number Validation
   
    
    if (empty($mobile_variable)) {
          header("location:../index.php?not_done");
        exit();
        
    } else if (!is_numeric($mobile_variable)) {
          header("location:../index.php?number");
        exit();
       
    }
    $lenth = strlen($mobile_variable);
    
     if ( $lenth != 11) {
        header("location:../index.php?mnmb11");
        exit();
    }
    // -----------------Radio Gender Validation
    if (empty($_POST['gender'])) {
        $error_message['gender'] = "Gender is required";
    }

     
            $insertQuere = "INSERT INTO `validation`( `mobile`, `gender`, `image`,`lang` ) VALUES ('$mobile_variable','$gender','$filename', '$chkarry' )";
          $run_Query = mysqli_query ($connect , $insertQuere);
              if ($run_Query == true) {

    
              header("location:../index.php?done");
           
      }
      else{
      	header("location:../index.php?not_done");

      }




?>