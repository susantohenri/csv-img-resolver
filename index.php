<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./proccess.php');
$csvImg = new csvImg();

?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>CSV-IMG</title>
</head>

<body>
    <?= $csvImg->getHTML() ?>
</body>

</html>