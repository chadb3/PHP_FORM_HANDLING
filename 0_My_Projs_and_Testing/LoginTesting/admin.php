<?php
session_start();
echo "session start". " ";
echo $_SESSION["username"]." ".$_SESSION["count"]." ".$_SESSION["permission"];
?><!DOCTYPE html>
<html>
<head>

</head>
<body>
<h1>Admin Page</h1>
</body>
</html>
