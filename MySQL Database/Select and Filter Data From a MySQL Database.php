<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahim";

// create connection
$conn= new mysqli($servername,$username,$password,$dbname);


// check connection

if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}

$sql = "SELECT ID, firstname,lastname FROM MyGuests WHERE lastname = 'Doe";
$resule = $conn->query($sql);

if($result -> num_row > 0){
    // output data of each row 
    while($row = $result->fetch_assoc()){
        echo "id:" . $row["id"]. " - Name:" . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
}
else{
        echo "0 results";
    }

$conn->close();

?>