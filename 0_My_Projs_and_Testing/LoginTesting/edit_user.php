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
}else{echo "<h3>Edit User: <i>{$_GET["name"]}</i></h3>";
?><!DOCTYPE html>

<?php }?>
</html>
