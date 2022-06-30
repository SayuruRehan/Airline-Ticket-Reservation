<?php
include_once '../config/database.php';

$email = $_POST['email']; //name of email input field
      $sql = "INSERT INTO sub (email) VALUES ( '$email')"; //column name
      if ($conn->query($sql) === TRUE) {
        echo "<br>Successfully subscribed!<br>";
        echo "<a href='../html/Home.html'>Return to Home</a>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    

mysqli_close($conn);

?>

