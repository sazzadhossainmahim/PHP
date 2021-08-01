<?php
include '../dbconfig.php';
$mobile_variable = $_REQUEST['mobile'];
$gender = $_REQUEST['gender'];
$photo = $_FILES["photo"];
$filename = $photo["name"];
$filepath = $photo["tmp_name"];
$fileerror = $photo["error"];

$checkbox1 = $_POST['techno'];
$chk = "";


if ($fileerror == 0) {
  $desnfile = 'uplod/' . $filename;
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

if ($lenth != 11) {
  header("location:../index.php?mnmb11");
  exit();
}
// -----------------Radio Gender Validation
if (empty($_POST['gender'])) {
  $error_message['gender'] = "Gender is required";
}
// --------------Techno multiple checkbox Validation
if(empty($_POST['techno'])){
        $error_message['chk1'] = "checkbox is required";

}
foreach ($checkbox1 as $chk1) {
  $chk .= $chk1 . ",";
}
// $in_ch = mysqli_query($con, "insert into request_quote(technology) values ('$chk')");
if ($in_ch == 1) {
  echo '<script>alert("Inserted Successfully")</script>';
}



// --------------------Insert in DB tables
$insertQuere = "INSERT INTO `validation`( `mobile`, `gender`,`techno`,image` ) VALUES ('$mobile_variable','$gender','$chk','$filename' )";
$run_Query = mysqli_query($connect, $insertQuere);
if ($run_Query == true) {
  header("location:../index.php?done");
} else {
  header("location:../index.php?not_done");
}
