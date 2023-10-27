<?php
include "User.php";
include "dbConnector.php";
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
<?php ?>
</body>
</html>
