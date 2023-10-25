<?php
//ob_start();
include "User.php";
include "dbConnector.php";
session_start();
$db=new SQLITE3("./DB/testDB.sqlite3");
/* The below works as expected.
 * $results = $db->query('SELECT * FROM USERS');
while ($row = $results->fetchArray()) {
    var_dump($row);
}*/
$validation_error = "";
$username = "";
$count=0;
$_SESSION["count"]=$count;
$users = ["admin"=>"admin123%","coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];
$permissions=["admin"=>"admin","coolBro123"=>"user","coderKid" => "developer","dogWalker" =>"user"];
$_SESSION["permission"]="default";
$db=new dbConnector();
 //$db->printUserInfo();
 //$res=$db->check_UsernamePassword("admin",hash("sha256","admin123%"));
 //echo $res;
 //$test_val=$res->fetchArray();
 //echo "<h3>RES: </h3><h2>{$res}</h2><br>";
 //echo "<br><h3>res: </h3>{$res['USER_NAME']}<br><h3>pass: </h3>{$res['PASSWORD']}<br>";

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $username = $_POST["username"];
   $password  = $_POST["password"];
   if ($res=$db->check_UsernamePassword($username,hash('sha256',$password))/*isset($users[$username]) && $users[$username] === $password*/){
	//echo "<br><h3>res: </h3>{$res['USER_NAME']}<br><h3>pass: </h3>{$res['PASSWORD']}<br>";
	$_SESSION["username"]=$res['USER_NAME'];//$username;
	$_SESSION["count"]+=1;
	//$_SESSION["permission"]=$permissions[$username];
	$user=new User($username,$password,$permissions[$username]);
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
  
  

