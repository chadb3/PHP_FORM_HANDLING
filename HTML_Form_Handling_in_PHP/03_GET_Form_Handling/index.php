<html>
<body>
<form method="get">
Country:
<input type="text" name="country">
<br>
Language:
<input type="text" name="language">
<br>
<input type="submit" value="Submit">
</form>
<br>
<!-- Note that this lesson calls for PHP shorthand or it will be marked wrong. -->
<p>Your language is: <?= $_GET['language']; ?></p>
<p>Your country is: <?= $_GET['country']; ?></p>

<a href="index.php">Reset</a>
</body>
</html>