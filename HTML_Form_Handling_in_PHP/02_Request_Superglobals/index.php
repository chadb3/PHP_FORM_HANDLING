<html>
<body>
    $_REQUEST:
    <?php print_r($_REQUEST);?>
    <br>
    $_GET:
    <?php print_r($_GET);?>
    <br>
    $_POST:
    <?php print_r($_POST);?>
    <form method="get">
        GET Form: <input type="text" name="get_name">
        <input type="submit" value="Submit GET">
    </form>
    <form method="post">
        POST Form: <input type="text" name="post_name">
        <input type="submit" value="Submit POST">
    </form>
    <a href="index.php">Reset</a>
</body>
</html>
