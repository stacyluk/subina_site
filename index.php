<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebPage</title>
</head>
<body style="background-color: cadetblue; text-align: center" >
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<p style='color: aliceblue; font-family: sans-serif; font-size: 48px;'>My first php page!<br></p>";
$date = date(DATE_RFC850);
/*trigger_error("Не могу поделить на ноль", E_USER_ERROR);*/
?>
<?php
printf("<div style='color: gold; font-size: 24px; font-family: Chandas'>Date: %s</div>", $date);
?>
</body>
</html>

