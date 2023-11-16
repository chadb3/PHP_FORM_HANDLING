<?php
include "User.php";
session_start();
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
		echo "<br><h1>Perm: {$perm}</h1><br>";
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
    <h1>You're in!</h1>
    <p><?php /*testFunc();*/getLinks();?></p>
    <p><?php $_SESSION["user"]->print_username(); ?></p>
    <p><?php $_SESSION["user"]->print_pass(); ?></p>
    <p><?php $_SESSION["user"]->print_perm_level();?></p>
    <h3>Congrats!</h3>
</body>
</html>

