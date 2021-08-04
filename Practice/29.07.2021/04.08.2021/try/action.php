<?php
session_start();
include 'config.php';
// include 'validation.php';

// variables 
$update = false;
$id = "";
$phone = "";
$education = "";
$gender = "";
$hoby = "";
$photo = "";


// -------------Add Section in crud

if (isset($_POST['add'])) {
  $phoneEmptyErr = "";
  $educationEmptyErr = "";
  $genderEmptyErr = "";
  $hobyEmptyErr = "";
  $photoEmptyErr = "";


  if (isset($_POST["submit"])) {
    // Set form variables
    $phone           = checkInput($_POST["phone"]);
    $education      = checkInput($_POST["education"]);
    $gender         = checkInput($_POST["gender"]);
    $hoby           = $_POST["hoby"];
    $photo        = checkInput($_POST["photo"]);

    // Name validation
    if (empty($phone)) {
      $photoEmptyErr = '<div class="error">
                phone can not be left blank.
            </div>';
    } // Allow letters and white space 
    else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
    } else {
      echo $name . '<br>';
    }


    // Select option validation
    if (empty($education)) {
      $educationEmptyErr = '<div class="error">
                Tell us about your education.
            </div>';
    } else {
      echo $education . '<br>';
    }


    // Radio button validation
    if (empty($gender)) {
      $genderEmptyErr = '<div class="error">
                Specify your gender.
            </div>';
    } else {
      echo $gender . '<br>';
    }


    // Checkbox validation
    if (!empty($hoby)) {
      foreach ($_POST['hoby'] as $val) {
        echo $val . '<br>';
      }
    } else {
      $hobyEmptyErr = '<div class="error">
                What are your hobbies.
            </div>';
    }

    if ($_FILES['img']['name']) {
      if (($_FILES['img']['size'] <= (1024 * 1024) and
        ($_FILES['img']['type'] == "img/jpeg") and
        ($_FILES['img']['type'] = "img/png"))) {
        move_uploaded_file($_FILES['img']['tmp_name'], "upload/" . time() . rand() . "-" . $_FILES['img']['name']);
      } else {
        $error_message['img'] = "Please upload image jpg or png format and size 1 mb";
      }
    }
  }

  function checkInput($input)
  {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }
  $phone = $_POST['phone'];
  $education = $_POST['education'];
  $gender = $_POST['gender'];
  $hoby   = $_POST['hoby'];
  $photo = $_FILES['image']['name'];
  $upload = "uploads/" . $photo;

  $query = "INSERT INTO practice(phone,education,gender,hoby,photo)VALUES(?,?,?,?,?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sssss", $phone, $education, $gender, $hoby[], $upload);
  $stmt->execute();
  move_uploaded_file($_FILES['image']['tmp_name'], $upload);

  header('location:index.php');
  $_SESSION['response'] = "Successfully Inserted to the database!";
  $_SESSION['res_type'] = "success";
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "SELECT photo FROM practice WHERE id=?";
  $stmt2 = $conn->prepare($sql);
  $stmt2->bind_param("i", $id);
  $stmt2->execute();
  $result2 = $stmt2->get_result();
  $row = $result2->fetch_assoc();

  $imagepath = $row['photo'];
  unlink($imagepath);

  $query = "DELETE FROM practice WHERE id=?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);
  $stmt->execute();

  header('location:index.php');
  $_SESSION['response'] = "Successfully Deleted!";
  $_SESSION['res_type'] = "danger";
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $query = "SELECT * FROM practice WHERE id=?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  $id = $row['id'];
  $phone = $row['phone'];
  $education = $row['education'];
  $gender = $row['gender'];
  $hoby = $row['hoby'];
  $photo = $row['photo'];

  $update = true;
}
if (isset($_POST['update'])) {
  $phone = $_POST['phone'];
  $education = $_POST['education'];
  $gender = $_POST['gender'];
  $hoby   = $_POST['hoby[]'];
  $phone = $_POST['phone'];
  $oldimage = $_POST['oldimage'];

  if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
    $newimage = "uploads/" . $_FILES['image']['name'];
    unlink($oldimage);
    move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
  } else {
    $newimage = $oldimage;
  }
  $query = "UPDATE practice SET phone=?,education=?,gender=?,hoby=?,photo=? WHERE id=?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("issssi", $phone, $education, $gender, $hoby, $newimage, $id);
  $stmt->execute();

  $_SESSION['response'] = "Updated Successfully!";
  $_SESSION['res_type'] = "primary";
  header('location:index.php');
}

if (isset($_GET['details'])) {
  $id = $_GET['details'];
  $query = "SELECT * FROM crud WHERE id=?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  $vid = $row['id'];
  $vphone = $row['phone'];
  $veducation = $row['education'];
  $vgender = $row['gender'];
  $vhoby = $row['hoby'];
  $vphoto = $row['photo'];
}
