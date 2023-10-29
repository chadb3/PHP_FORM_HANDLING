<?php
include "User.php";
include "dbConnector.php";
$db=new dbConnector();
session_start();
//echo "session start". " ";
//echo $_SESSION["username"]." ".$_SESSION["count"]." ".$_SESSION["permission"];
if($_SESSION["user"]->getPermissionLevel()!=="admin")
{
	header('HTTP/1.1 403 Forbidden');
	echo "\n<h1>Access Denied!</h1>";
}else{echo "<h3>Welcome Admin!</h3>";}
?><!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1>Admin Page</h1>
<br><br>
<h2>Add New User:</h2>
<p> use this to add new users</p>
<form method="post">
<label for="uname">USERNAME:</label><br>
<input type="text" id="uname" name="uname"><br>
<label for="uname">PASSWORD:</label><br>
<input type="text" id="pword" name="pword"><br>
<label for="uname">Access Level:</label><br>
<select id="access_level" name="access_level">
	<option value="user">User</option>
	<option value="dev">Developer</option>
	<option value="admin">Admin</option>
</select>
<br><br>
<input type="submit" value="Submit">
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
echo $_POST["uname"];
$db->addUser($_POST["uname"],$_POST["pword"],$_POST["access_level"],$_SESSION["user"]->getUserName());
//todo add more checks.
// see why it appears to call a function before I press the button.
// set min lengths for input to prevent blank inputs.
}
?>
</form>
<?php ?>
</body>
</html>
