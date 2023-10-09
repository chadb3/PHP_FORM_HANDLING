<!DOCTYPE html>
<html>
<body>
<?php
	$a=$_GET['first'];
	$b=$_GET['second'];
	$c=$a+$b;
	?>
<?=$_GET['first'] . " + " . $_GET['second'] . ' = ' . $c . "<br>";?>

<a href="index.php">Reset</a>
</body>
</html>
