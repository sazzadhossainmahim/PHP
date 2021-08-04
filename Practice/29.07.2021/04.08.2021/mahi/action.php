<?php


   

      $mobile_variable = $_REQUEST['mobile'];
        $gender = $_REQUEST['gender'];
        // $photo = $_FILES['img']['name'];
        // $upload = "uploads/" . $photo;
       echo $mobile_variable ;
        echo $gender ;
       exit;


        // Data Insertion
        $query = "INSERT INTO validation(Mobile,Gender,photo)VALUES('$Mobile_variable','$Gender','$upload')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $Mobile_variable, $Gender, $upload);
        $stmt->execute();
        move_uploaded_file($_FILES['img']['tmp_name'], $upload);

        header('location:index.php');
        $_SESSION['response'] = "Successfully Inserted to the database!";
        $_SESSION['res_type'] = "success";
    
    // ---------------------------------------------
    // delete section
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $sql = "SELECT photo FROM validation WHERE id=?";
        $stmt2 = $conn->prepare($sql);
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row = $result2->fetch_assoc();

        $imagepath = $row['photo'];
        unlink($imagepath);

        $query = "DELETE FROM validation WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header('location:index.php');
        $_SESSION['response'] = "Successfully Deleted!";
        $_SESSION['res_type'] = "danger";
    }




    // ------------------------------------------
    // edit section
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $query = "SELECT * FROM validation WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $id = $row['id'];
        $Mobile_variable = $row['Mobile'];
        $Gender = $row['Gender'];
        $photo = $row['photo'];

        $update = true;
    }

    // show update section
    // update section
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $Mobile_variable = $_POST['Mobile'];
        $Gender = $_POST['Gender'];
        $oldimage = $_POST['oldimage'];

        if (isset($_FILES['img']['name']) && ($_FILES['img']['name'] != "")) {
            $newimage = "uploads/" . $_FILES['img']['name'];
            unlink($oldimage);
            move_uploaded_file($_FILES['img']['tmp_name'], $newimage);
        } else {
            $newimage = $oldimage;
        }
        $query = "UPDATE validation SET Mobile=?,Gender=?photo=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $Mobile_variable, $Gender, $newimage, $id);
        $stmt->execute();

        $_SESSION['response'] = "Updated Successfully!";
        $_SESSION['res_type'] = "primary";
        header('location:index.php');
    }

    // Show Details Data
    if (isset($_GET['details'])) {
        $id = $_GET['details'];
        $query = "SELECT * FROM validation WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $vid = $row['id'];
        $vMobile_variable = $row['mobile'];
        $vGender = $row['gender'];
        $vphoto = $row['mobile'];
    }

