<?php
   
      $fname=$_POST['fname'];
	  $lname=$_POST['lname'];
	  $gender=$_POST['gender'];
	  $email=$_POST['email'];
	  $phone=$_POST['phone'];
	  $username=$_POST['username'];
	  $Password=$_POST['Password'];
	  $ConPassword=$_POST['ConPassword'];
	  
$conn=new mysqli('localhost','root','','register');
if($conn->connect_error){
	die('Connection failed:'.$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into entry_details(first_name,last_name,gender,email,phone_number,username,password,confirm_password)
	values(?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssisii",$fname,$lname,$gender,$email,$phone,$username,$Password,$ConPassword);
	$stmt->execute();
	echo"registration successfully..";
	 header('Location: ../../PROJECT/html/register.html'); 
	$stmt->close();
	$conn->close();
}
?>