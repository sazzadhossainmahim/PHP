<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation</title>
</head>

<body>
    <?php
    // define variables and set to empty values
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP form Validation</h2>
    <form method="POST" action="">
        Name: <input type="text" name="name">
        <br>
        Email: <input type="text" name="email">
        <br>
        website: <input type="text" name="website">
        <br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="Other">Other
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">

    </form>
    <?php
    print "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    print $email;
    echo "<br>";
    print $website;
    echo "<br>";
    print $comment;
    echo "<br>";
    print $gender;
    ?>
</body>

</html>