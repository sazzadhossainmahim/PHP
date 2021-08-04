<?php
include 'action.php';
// include 'validation.php';
?>

<title>CRUD App</title>
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
<form action="action.php" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <!-- phone  -->
    <label class="col-sm-4 col-form-label">Phone</label>
    <div class="col-sm-8">
      <input type="text" name="phone" class="form-control">
    </div>
  </div>


  <!-- Select box -->
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Education</label>
    <div class="col-sm-8">
      <select id="education" name="education" class="form-control">
        <option selected="" disabled>...</option>
        <option value="Graduation">Graduation</option>
        <option value="Post Graduation">Post Graduation</option>
      </select>
    </div>
  </div>
  <br>


  <!-- Gender -->
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-4 pt-0">Gender</legend>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
          <label class="custom-control-label" for="male">Male</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
          <label class="custom-control-label" for="female">Female</label>
        </div>
      </div>
    </div>
  </fieldset>
  <br>



  <!-- Multiple checkbox -->
  <div class="form-group row">
    <div class="col-sm-4">Hobbies</div>

    <div class="col-sm-8">
      <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name="hoby[]" value="Drawing" class="custom-control-input" id="drawing">
        <label class="custom-control-label" for="drawing">Drawing</label>
      </div>

      <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name="hoby[]" value="Singing" class="custom-control-input" id="singing">
        <label class="custom-control-label" for="singing">Singing</label>
      </div>

      <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name="hoby[]" value="Dancing" class="custom-control-input" id="dancing">
        <label class="custom-control-label" for="dancing">Dancing</label>
      </div>

    </div>
  </div>
  <br>


  <!-- Photo Upload  -->
  <div class="form-group row">
    <div class="col-sm-4">Profile DP</div>
    <div class="col-sm-8">
      <input type="hidden" name="oldimage">
      <input type="file" name="image" class="custom-file">
      <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
    </div>
  </div>


  <br>
  <!-- Submit button box -->
  <!-- ADD  Edit Update  -->
  <div class="form-group row">
    <?php if ($update == true) { ?>
      <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
    <?php } else { ?>
      <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
    <?php } ?>
  </div>
</form>

<!-- edit section close  -->

<!-- detailes section -->
<div class="col-md-8">
  <?php
  $query = 'SELECT * FROM practice';
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();
  ?>
  <h3 class="text-center text-info">Records Present In The Database</h3>
  <table class="table table-hover" id="data-table">
    <thead>
      <tr>
        <th>#</th>
        <th>Phone</th>
        <th>Education</th>
        <th>Gender</th>
        <th>Hobbies</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['id']; ?></td>
          <td><img src="<?= $row['photo']; ?>" width="25"></td>
          <td><?= $row['phone']; ?></td>
          <td><?= $row['education']; ?></td>
          <td><?= $row['gender']; ?></td>
          <td><?= $row['hobbies']; ?></td>
          <td>
            <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
            <a href="action.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
            <a href="index.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>

<!-- data tables function -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
</script>