<?php
session_start();
echo "session start";
echo $_SESSION["username"];
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
    <h3>Congrats!</h3>
</body>
</html>

