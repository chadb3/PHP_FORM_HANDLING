<?php
include "User.php";
session_start();
//echo "session start". " ";
//echo $_SESSION["username"]." ".$_SESSION["count"]." ".$_SESSION["permission"];
if($_SESSION["user"]->getPermissionLevel()!=="admin" && $_SESSION["user"]->getPermissionLevel()!=="dev")
{
	header('HTTP/1.1 403 Forbidden');
	echo "\n<h1>Access Denied!</h1>";
}
?><!DOCTYPE html>
<html>
<head>

</head>
<body>
<h1>Dev Page</h1>
</body>
</html>
