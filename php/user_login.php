<?php require_once('connect.php'); ?>
<?php
   
//   	  $username=$_POST['username'];
// 	  $password=$_POST['password'];
	  	  
// $conn=new mysqli('localhost','root','','login');
// if($conn->connect_error){
// 	die('Connection failed:'.$conn->connect_error);
// }else{
// 	$stmt=$conn->prepare("insert into accounts(username,password)
// 	values(?,?)");
// 	$stmt->bind_param("ss",$username,$password);
// 	$stmt->execute();
// 	echo"registration successfull";
// 	header ('Location: ../../PROJECT/html/user_home.html');

// 	$stmt->close();
// 	$conn->close();
// }

        $errors = array();

        if(!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1){
            $errors[] = 'Username is Missing / Invalid';
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1){
            $errors[] = 'Password is Missing / Invalid';
        }

        if(empty($errors)){
        
            $email = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            // $hashed_password = sha1($password);

            $query = "  SELECT * 
                    FROM entry_details
                    WHERE username = '{$email}' AND password = '{$password}'
                    LIMIT 1";
        
            $result_set = mysqli_query($connection, $query);

            if($result_set){
    
                if(mysqli_num_rows($result_set) == 1){
                   
                     header('Location: ../../PROJECT/html/user_home.html'); 
                } 
				else{
                    
                    header('Location: ../../PROJECT/html/login.html');
                }
            }else{
                $errors[] = 'Database query failed';
                 echo('Invalid Username/Password');
            }
         }
         else{
             echo("Your Username / Password is Missing");
         }
		 ?>