<?php require_once('connection.php');?>
<?php

$ID='';
$Username ='IDsandali';
$FirstName='Sandani';
$LastName='anjana';
$Location = 'Colombo, Sri Lanka';
$EmailAddress='sandali234@gmail.com';
$Phone='0705435574';
$Birthday ='1999-05-26';

$query = "INSERT INTO user(id,username,fname,lname,address,email,phone,birthday) VALUE ('{$id}','{$Username}','{$FirstName}','{$LastName}','{$Location}','{$EmailAddress}','{$Phone}','{$Birthday}')";
$result = mysqli_query($connection,$query);

if($result){
    echo "1 record added";
}
else{
    echo "database query failed";
}
?>