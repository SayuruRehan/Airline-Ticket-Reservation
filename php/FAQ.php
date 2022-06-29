<?php
include_once '../config/database2.php';

$name = $_POST['name'];
$email = $_POST['email']; //name of email input field
$question = $_POST['question'];
// print_r($email);



    // if($email == null )
    // {
    //   $msg = "Required fields.";
    //     $msgEncoded = base64_encode($msg);
        
    // } else {
      $sql = "INSERT INTO faqs (name, email, question) VALUES ( '$name','$email','$question')";
      //column name
      if ($conn->query($sql) === TRUE) {
        echo "<br>You will be contacted within 24 Hours!<br>";
        echo "<a href='../html/Home.html'>Return to Home</a>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    

mysqli_close($conn);

?>