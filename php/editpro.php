<?php require_once('connection.php');?>

<?php
$connection = mysqli_connect('localhost','root','','usern');
$db = mysqli_select_db($connection,'usern');

if(isset($_POST['submit']))
{
     $ID = $_POST['id'];

    $query = "UPDATE user SET username='$_POST[username]',fname='$_POST[fname]', lname='$_POST[lname]', address='$_POST[address]', email='$_POST[email]', phone='$_POST[Phone]', birthday='$_POST[birthday]' where id ='$_POST[id]' ";
    $query_run =mysqli_query($connection,$query);

    if($query_run)
    {
       echo '<script type="text/javascript"> alert("Data Updated")</script>';
       header ('Location: ../../edit/html/editPro.html');
   
    }
    else
    {
        echo '<script type="text/javascript"> alert("Data not Updated")</script>';
    }
}    
?>