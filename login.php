
<?php
require "mysql.php";

$con = new Mysql();
$sql = "select *from users";
$result = $con->sql($sql);

$con->close();