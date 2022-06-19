<?php
   
      $from=$_POST['from'];
	  $to=$_POST['to'];
	  $depart=$_POST['depart'];
	  $comeback=$_POST['comeback'];
	  $class=$_POST['class'];
	  $ticketType=$_POST['ticketType'];
	  $trip=$_POST['trip'];
	  $currency=$_POST['currency'];
	  $adults=$_POST['adults'];
	  $children=$_POST['children'];
	  $baggage=$_POST['baggage'];
	  
	  
$conn=new mysqli('localhost','root','','bookflights');
if($conn->connect_error){
	die('Connection failed:'.$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into details(from_where,to_where,depart,come_back,class,ticket_type,trip,currency,adults,children,baggage)
	values(?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssssssiii",$from,$to,$depart,$comeback,$class,$ticketType,$trip,$currency,$adults,$children,$baggage);
	$stmt->execute();
	echo"registration successfully..";
	 header('Location: ../../PROJECT/html/pay.html'); 

	$stmt->close();
	$conn->close();
}
?>