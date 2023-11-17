<?php
include "User.php";
include "dbConnector.php";
include "getUsers.php";
$db=new dbConnector();
session_start();
if($_SESSION["user"]->getPermissionLevel()!=="admin")
{
	header('HTTP/1.1 403 Forbidden');
	echo "\n<h1>Access Denied!</h1>";
}else{
?><!DOCTYPE html>
<head>
	<title>Editing: <?= $_GET["name"]; ?></title>
	<style>
		h1{display:inline;padding-right:.5em;}
		.i{font-size:34;}
	</style>
</head>
<?php echo "<h1>Edit User:</h1>    <i style=\"color:red;font-size:34px;\">{$_GET["name"]}</i>";?>
<?php }?>
</html>
