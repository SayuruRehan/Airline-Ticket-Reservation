<?php
   
  	  $feedback_desc=$_POST['feedback_desc'];
	  
$conn=new mysqli('localhost','root','','helpcenter');
if($conn->connect_error){
	die('Connection failed:'.$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into feedback(feedback_desc)
	values(?)");
	$stmt->bind_param("s",$feedback_desc);
	$stmt->execute();
	// echo"Feedback submitted!";
	// header('Location: ../../PROJECT/html/contact.html'); 
	$stmt->close();
	$conn->close();
}
?>