<?php

// Error messages
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
