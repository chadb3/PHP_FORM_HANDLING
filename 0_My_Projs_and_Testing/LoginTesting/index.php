<?php
include "User.php";
include "dbConnector.php";
session_start();
$validation_error = "";
$username = "";
$count=0;
$_SESSION["count"]=$count;

$_SESSION["permission"]="default";
$db=new dbConnector();
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $username = $_POST["username"];
   $password  = $_POST["password"];
   if ($res=$db->check_UsernamePassword($username,hash('sha256',$password))){

	$_SESSION["username"]=$res['USER_NAME'];//$username;
	$_SESSION["count"]+=1;
	$_SESSION["permission"]=$res['PERMISSION_LEVEL'];
	$user=new User($username,$password,$_SESSION["permission"]);
	$_SESSION["user"]=$user;
	header("Location: success.php");
	exit;
     
     
   } else {
     $validation_error = "* Incorrect username or password.";
   }
 }

?>
  
<h3>Welcome back!</h3>
<form method="post" action="">
Username:<input type="text" name="username" value="<?php echo $username;?>">
<br>
Password:<input type="text" name="password" value="">
<br>
<span class="error"><?= $validation_error;?></span>
<br>
<input type="submit" value="Log in">
</form>
  
  

