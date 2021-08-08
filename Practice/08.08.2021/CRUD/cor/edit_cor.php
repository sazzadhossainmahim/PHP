<?php
include '../dbconfig.php';
$id = $_REQUEST['id'];
$gender = $_REQUEST['gender'];
$language = $_REQUEST['lang'];
$lang = implode(' , ',  $language);
$photo = $_FILES["photo"];
$filename = $photo["name"];
$filepath = $photo["tmp_name"];
$fileerror = $photo["error"];

if ($fileerror == 0) {
  $desnfile = 'uplod/' . $filename;
  move_uploaded_file($filepath, $desnfile);
}


$mobile_variable = $_REQUEST['mobile'];
if (empty($gender)) {
  header("location:../index.php?gender_error");
  exit();
}
if (empty($lang)) {
  header("location:../index.php?languag_eerror");
  exit();
}


if (empty($mobile_variable)) {
  header("location:../index.php?number");
  exit();
} else if (!is_numeric($mobile_variable)) {
  header("location:../index.php?edit_number");
  exit();
}
$lenth = strlen($mobile_variable);

if ($lenth != 11) {
  header("location:../index.php?edit_mnmb11");
  exit();
}
if (!empty($photo)) {
  $insertQuere = "UPDATE `validation` SET `mobile`='$mobile_variable',`gender`='$gender' , `lang`='$lang',`image`='$filename' WHERE id=$id";
  $run_Query = mysqli_query($connect, $insertQuere);
  if ($run_Query == true) {


    header("location:../index.php?UPDATE");
  } else {
    header("location:../index.php?not_UPDATE");
  }
} else {
  $insertQuere = "UPDATE `validation` SET `mobile`='$mobile_variable',`gender`='$gender' , `lang`='$lang' WHERE id=$id";
  $run_Query = mysqli_query($connect, $insertQuere);
  if ($run_Query == true) {


    header("location:../index.php?UPDATE");
  } else {
    header("location:../index.php?not_UPDATE");
  }
}
