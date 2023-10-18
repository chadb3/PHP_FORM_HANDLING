<?php
//ob_start();
include "User.php";
session_start();
$validation_error = "";
$username = "";
$count=0;
$_SESSION["count"]=$count;
$users = ["admin"=>"admin123%","coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];
$permissions=["admin"=>"admin","coolBro123"=>"user","coderKid" => "developer","dogWalker" =>"user"];
$_SESSION["permission"]="default";


 if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $username = $_POST["username"];
   $password  = $_POST["password"];
   if (isset($users[$username]) && $users[$username] === $password){
// Add your code here:
	$_SESSION["username"]=$username;
	$_SESSION["count"]+=1;
	$_SESSION["permission"]=$permissions[$username];
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
  
  

