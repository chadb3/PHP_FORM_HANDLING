<?php
session_start();
session_unset();
session_destroy();
//$_SESSION["permission"]="default";
//header("location:index.php");
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Successful Login</title>
</head>
<body>
    <h1>You have logged out!</h1>
    <h3>Congrats!</h3>
    <li><a href="index.php">Home</a></li>
</body>
</html>
</html>
