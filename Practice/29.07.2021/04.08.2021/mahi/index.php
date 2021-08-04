

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
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


<body>



    <div class="form-validation">
                    <?php
                              if (isset($_GET["mnmb11"])) {
                                  echo '<div class="container">
  
                                 <div  class="alert alert-danger alert-dismissible fade show">
                                 <button style="font-size: 25px;      color: red;" type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Validation error!</strong>Only 11 digit Number required . 
                                 </div>
 
                                 </div>';
                                      }


                              ?>
                                                  <?php
                              if (isset($_GET["number"])) {
                                  echo '<div class="container">
  
                                 <div  class="alert alert-danger alert-dismissible fade show">
                                 <button style="font-size: 25px;      color: red;" type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Validation error!</strong>Your mobile number must be number . 
                                 </div>
 
                                 </div>';
                                      }


                              ?>
        <h2>Validation</h2>
        <!-- 
                1. Bangladesh mobile number validation (11 digit minimum, only number will be taken in text box)------ok

                2. Radio button value should be selected in the edit form----------------ok

                3. Checkbox button value should be selected in the edit form.------------ok

                4. Radio button value, checkbox value should be shown in details page.----------ok

                5. Image name should be like original name. (if you upload a file like Sajjad hossain.jpg, this file name should be lik sajjad_hossain_currentdatetime.jpg)
                --------ok
            -->
        <form action="cor/ins_cor.php" method="post" enctype="multipart/form-data">
            <table>
                <!-- Bangladesh mobile number validation -->
                <tr class="row">

                    <td class="label"><label for="Mobile">Enter Mobile Number</label></td>
                    <td><input type="text" class="text" placeholder="Mobile" id="Mobile" name="mobile" required></td>
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
                        <input type="radio" name="gender" id="Gender" value="Male" required  />
                        <label for="sex">Male</label>


                        <input type="radio" name="gender" id="Gender" value="Female" required />
                        <label for="sex">Female</label>
                        
                    </td>
                </tr>

                <!-- Image Upload Input -->
                <tr class="row">
                    <td class="label"><label for="img">Image</label></td>
                    <td><input type="file" name="photo" id="Image" required>
                      
                    </td>
                </tr>

                <!-- Checkbox button input -->
                <tr class="row">
                    <td class="label">
                        <input type="checkbox" name="agree" id="agree" value="yes " required  />
                        <label for="agree">I agree Teams of service and privacy policy</label>
                        <?php
                        if (isset($error_message['agree'])) {
                            echo "<div class='error'>" . $error_message['agree'] . "</div>";
                        }
                        ?>
                    </td>
                </tr>
                 <div class="checkbox">
                    <p>Language : </p>
      <label><input type="checkbox" value="C" name="lang[]">C</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="C++" name="lang[]">C++</label>
    </div>
        <div class="checkbox">
      <label><input type="checkbox" value="C#" name="lang[]">C#</label>
    </div>
     </div>
        <div class="checkbox">
      <label><input type="checkbox" value="JAVA"   name="lang[]">JAVA</label>
    </div>
     </div>
        <div class="checkbox">
      <label><input type="checkbox" value="PHP" name="lang[]">PHP</label>
    </div>

   
                <tr>
                    <td><input type="submit" class="btn " value="add" name="form"></td>
                <!--     <?php 
                    if ($update == true) { ?>
                        <input type="submit" name="update" class="btn" value="Update Record">
                    <?php } else { ?>
                         <input type="submit" name="add" class="btn btn-primary btn-block" value=""> 
                    <?php } ?> -->
                </tr>
            </table>




            <!-- Submit button method  -->


        </form>
    </div>


    <!-- value seciton -->
    <div class="col-md-8">
               

        <h3 class="text-center text-info">Records Present In The Database</h3>
            <?php
                              if (isset($_GET["done"])) {
                                  echo '<div class="container">
                                            
  
                                         <div class="alert alert-success alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert">×</button>
                                         <strong>Success!</strong> Your contact add successfully.
                                           </div>
                                        </div>';
                                      }


                              ?>

                                          <?php
                              if (isset($_GET["UPDATE"])) {
                                  echo '<div class="container">
                                            
  
                                         <div class="alert alert-success alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert">×</button>
                                         <strong>Success!</strong> Your contact UPDATE successfully.
                                           </div>
                                        </div>';
                                      }


                              ?>

        
                             <?php
                              if (isset($_GET["deleted"])) {
                                  echo '<div class="container">
  
                                 <div style="display: grid;    width: 46%;" class="alert alert-danger alert-dismissible fade show">
                                 <button style="font-size: 25px;      color: red;" type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Deleted!</strong> Your contact deleted successfully . 
                                 </div>
 
                                 </div>';
                                      }


                              ?>
                                                  <?php
                              if (isset($_GET["edit_mnmb11"])) {
                                  echo '<div class="container">
  
                                 <div  class="alert alert-danger alert-dismissible fade show">
                                 <button style="font-size: 25px;      color: red;" type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Validation error not update!</strong>Only 11 digit Number required . 
                                 </div>
 
                                 </div>';
                                      }


                              ?>
                                                  <?php
                              if (isset($_GET["edit_number"])) {
                                  echo '<div class="container">
  
                                 <div  class="alert alert-danger alert-dismissible fade show">
                                 <button style="font-size: 25px;      color: red;" type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Validation error not update !</strong>Your mobile number must be number . 
                                 </div>
 
                                 </div>';
                                      }


                              ?>
        <table class="table table-hover" id="data-table">
            <thead>



                <tr>
                    <th>#</th>
                    <th>Mobile</th>
                    <th>Language</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                  <?php
                                    require_once("dbconfig.php");
                                      $q="SELECT * FROM `validation`  "   ;
                                           $query = mysqli_query ($connect , $q);
                                           while ( $res=mysqli_fetch_array($query)){
                                             // echo '<pre>';print_r($res);exit;
                                           



                                             
                                     ?>

           
                    <tr>
                        <td><?= $res['id']; ?></td>
                        
                        <td><?= $res['mobile']; ?></td>
                        <td><?= $res['lang']; ?></td>
                        <td><?= $res['gender']; ?></td>

                        <td>
                            <img src="cor/uplod/<?= $res['image']; ?>" style="height: 66px;"  >
                            <br>
                            
                            <i data-toggle="modal" data-target="#picUpdateModal<?php echo $res['id'] ?>" class="fas fa-edit" ></i>
                            
                        </td>


                        <td>
                            <a href="" class="badge badge-primary p-2" data-toggle="modal" data-toggle="modal" data-target="#myModal<?= $res['id']; ?>" >Details</a>
                             |
                            <a href="cor/deleted_cor.php?id=<?= $res['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                            <a href="" class="badge badge-success p-2" data-toggle="modal" data-toggle="modal" data-target="#edit<?= $res['id']; ?>">Edit</a>
                        </td>
                    </tr>
               
            </tbody>


    </div>
    <!-- The Modal -->
<div class="modal" id="myModal<?= $res['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Details    </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="card" style="width:400px">
    <img class="card-img-top" src="cor/uplod/<?= $res['image']; ?>" alt="Card image" style="width:100%"> 
    <div class="card-body">



      <h4 class="card-title"> ID : <?= $res['id']; ?></h4>

      <h4 class="card-title"> Mobile: <?= $res['mobile']; ?></h4>
      <h4 class="card-title"> Mobile: <?= $res['lang']; ?></h4>
      <h4 class="card-title"> Gender: <?= $res['gender']; ?></h4>


      
      
    </div>
  </div>

      </div>
        


      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-danger"><a href="cor/deleted_cor.php?id=<?= $res['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <!-- The Modal -->
<div class="modal" id="edit<?= $res['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit   </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="cor/edit_cor.php">
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" id="email"value="<?= $res['id']; ?>" >
    <label for="email">Mobile:</label>
    <input type="text" class="form-control" name="mobile" id="email"value="<?= $res['mobile']; ?>" >
  </div>
   <div class="form-group">
    <label for="email">Language</label>
    <input type="text" class="form-control" name="lang" id="email" value="<?= $res['lang']; ?>">
  </div>
   <div class="form-group">
    <label for="email">Gender:</label>
    <input type="text" class="form-control" name="gender" id="email" value="<?= $res['gender']; ?>">
  </div>
  
  <button type="submit" class="btn btn-default">Edit</button>
</form>






  

      </div>
        


      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-danger"><a href="cor/deleted_cor.php?id=<?= $res['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 <!-- picUpdateModal -->
<div class="modal" id="picUpdateModal<?= $res['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit your pictur   </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="cor/picedit_cor.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" id="email"value="<?= $res['id']; ?>" >
    <label for="email">Pictur:</label>
    <input type="file" name="photo" id="email"  required>
  </div>
 
  
  <button type="submit" class="btn btn-default">Edit</button>
</form>






  

      </div>
        


      <!-- Modal footer -->
      <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 

 <?php } ?>

</body>

</html>