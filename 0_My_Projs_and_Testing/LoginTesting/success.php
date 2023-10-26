<?php
include "User.php";
session_start();
//echo "session start". " ";
//echo $_SESSION["username"]." ".$_SESSION["count"]."<br><br>";
//testing function call
//echo "<h2>".User::printx()."</h2>";
//echo session_id()
function testFunc()
{
	echo "ASDF";
}
// gets the links based off of User permissions
function getLinks()
{
	$perm=$_SESSION["user"]->getPermissionLevel();
	if($perm==="admin"){
		echo "<li><a href=\"admin.php\">ADMINS ONLY</a></li>";
	}
	if($perm==="dev" or $perm==="admin"){
		echo "<li><a href=\"dev.php\">DEV'S PAGE</a></li>";
	}
	if($perm==="user" or $perm==="dev" or $perm==="admin")
	{
		echo "<li><a href=\"users.php\">USER'S PAGE</a></li>";
	}else{
		echo "<li><a href=\"logout.php\"><h1>ADMINS ONLY</h1></a></li>";
		echo "<li><a href=\"logout.php\"><h1>PASSWORDS</h1></a></li>";
	}
		echo "<li><a href=\"logout.php\">logout</a></li>";
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Successful Login</title>
</head>
<body>
	<!--
	<li><a href="logout.php">logout</a></li>
    <li><a href="admin.php">ADMINS ONLY</a></li>
    <li><a href="dev.php">DEV'S PAGE</a></li>
    <li><a href="users.php">USER'S PAGE</a></li>-->
    <h1>You're in!</h1>
    <p><?php testFunc();getLinks();?></p>
    <p><?php $_SESSION["user"]->print_username(); ?></p>
    <p><?php $_SESSION["user"]->print_pass(); ?></p>
    <p><?php $_SESSION["user"]->print_perm_level();?></p>
    <h3>Congrats!</h3>
</body>
</html>

