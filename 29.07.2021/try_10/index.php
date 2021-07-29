<!-- Database connection -->
<?php
include 'action.php';
// // ---------------------------validation Process
// if (isset($_POST['form'])) {


//     // --------------Mobile Number Validation
//     $Mobile_variable = $_POST['Mobile'];
//     if (empty($Mobile_variable)) {
//         $error_message['Mobile'] = "Mobile NUmber is Required";
//     } else if (!is_numeric($Mobile_variable)) {
//         $error_message['Mobile'] = "Only number Input";
//     } else if ((strlen($Mobile_variable) <= 11)) {
//         $error_message['Mobile'] = "Only 11 digit Number";
//     }
//     // -----------------Radio Gender Validation
//     if (empty($_POST['Gender'])) {
//         $error_message['Gender'] = "Gender is required";
//     }
//     //  -----------------Image Validation 

//     if ($_FILES['img']['name']) {

//         if (($_FILES['img']['size'] <= (1024 * 1024) and
//             ($_FILES['img']['type'] == "img/jpeg") and
//             ($_FILES['img']['type'] = "img/png"))) {
//             move_uploaded_file($_FILES['img']['tmp_name'], "upload/" . time() . rand() . "-" . $_FILES['img']['name']);
//         } else {
//             $error_message['img'] = "Please upload image jpg or png format and size 1 mb";
//         }
//     }

//     //--------------- Checkbox Validaiton
//     if (empty($_POST['agree'])) {
//         $error_message['agree'] = "Agree is required";
//     }
// }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>


    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="form-validation">
        <h2>validation</h2>
        <!-- 
                1. Bangladesh mobile number validation (11 digit minimum, only number will be taken in text box)------ok

                2. Radio button value should be selected in the edit form----------------ok

                3. Checkbox button value should be selected in the edit form.------------ok

                4. Radio button value, checkbox value should be shown in details page.----------ok

                5. Image name should be like original name. (if you upload a file like Sajjad hossain.jpg, this file name should be lik sajjad_hossain_currentdatetime.jpg)
                --------ok
            -->
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <!-- Bangladesh mobile number validation -->
                <tr class="row">

                    <td class="label"><label for="Mobile">Enter Mobile Number</label></td>
                    <td><input type="text" class="text" placeholder="Mobile" id="Mobile" name="Mobile"></td>
                    <?php
                    if (isset($error_message['Mobile'])) {
                        echo "<div class='error'>" . $error_message['Mobile'] . "</div>";
                    }
                    ?>
                    </td>
                </tr>


                <!-- radio button input-->
                <tr class="row">
                    <td class="label"><label for="Gender">Gender</label></td>
                    <td>
                        <input type="radio" name="Gender" id="Gender" value="Male" <?php
                                                                                    if (isset($Gender) && $Gender = 'Male') echo 'checked="checked"'; ?> />
                        <label for="sex">Male</label>


                        <input type="radio" name="Gender" id="Gender" value="Female" <?php
                                                                                        if (isset($Gender) && $Gender = 'Female') echo 'checked="checked"'; ?> />
                        <label for="sex">Female</label>
                        <?php
                        if (isset($error_message['Gender'])) {
                            echo "<div class='error'>" . $error_message['Gender'] . "</div>";
                        }

                        ?>
                    </td>
                </tr>

                <!-- Image Upload Input -->
                <tr class="row">
                    <td class="label"><label for="img">Image</label></td>
                    <td><input type="file" name="img" id="Image">
                        <?php
                        if (isset($error_message['img'])) {
                            echo "<div class='error'>" . $error_message['img'] . "</div>";
                        }
                        ?>
                    </td>
                </tr>

                <!-- Checkbox button input -->
                <tr class="row">
                    <td class="label">
                        <input type="checkbox" name="agree" id="agree" value="yes" <?php
                                                                                    if (isset($agree) && $agree = 'yes') echo 'checked = "checked"' ?> />
                        <label for="agree">I agree Teams of service and privacy policy</label>
                        <?php
                        if (isset($error_message['agree'])) {
                            echo "<div class='error'>" . $error_message['agree'] . "</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" class="btn " value="add" name="form"></td>
                    <?php 
                    if ($update == true) { ?>
                        <input type="submit" name="update" class="btn" value="Update Record">
                    <?php } else { ?>
                        <!-- <input type="submit" name="add" class="btn btn-primary btn-block" value=""> -->
                    <?php } ?>
                </tr>
            </table>



            <!-- Submit button method  -->


        </form>
    </div>


    <!-- value seciton -->
    <div class="col-md-8">



        <?php
        $query = 'SELECT * FROM validation';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
        <h3 class="text-center text-info">Records Present In The Database</h3>
        <table class="table table-hover" id="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><img src="<?= $row['photo']; ?>" width="25"></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['gender']; ?></td>


                        <td>
                            <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
                            <a href="action.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                            <a href="index.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
    </div>

</body>

</html>