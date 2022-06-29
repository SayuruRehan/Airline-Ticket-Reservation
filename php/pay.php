<?php
   
      $cardno = $_POST['Crdnumber'];
	  $cardHname= $_POST['name'];
	  
	  
$conn=new mysqli('localhost','root','','payment');
if($conn->connect_error){
	die('Connection failed:'.$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into card(cardno,cardhname)
	values(?,?)");
	$stmt->bind_param("ss",$cardno,$cardHname);
	$stmt->execute();
	echo"registration successfully..";
	header ('Location: ../../PROJECT/html/pay.html');
	$stmt->close();
	$conn->close();
}
?>