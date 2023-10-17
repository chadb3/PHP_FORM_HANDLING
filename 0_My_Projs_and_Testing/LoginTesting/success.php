<?php
session_start();
echo "session start". " ";
echo $_SESSION["username"]." ".$_SESSION["count"];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Successful Login</title>
    <li><a href="logout.php">logout</a></li>
    <li><a href="admin.php">ADMINS ONLY</a></li>
    <li><a href="dev.php">DEV'S PAGE</a></li>
    <li><a href="users.php">USER'S PAGE</a></li>
</head>
<body>
    <h1>You're in!</h1>
    <h3>Congrats!</h3>
</body>
</html>

