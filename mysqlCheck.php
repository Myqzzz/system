<?php
require "mysql.php";
header("Content-type: text/html; charset=gbk");

$con = new Mysql();
$sql = "select *from users";
$rows = $con->getResultNum($sql);// ����
$result = $con->sql($sql);
$colums = mysqli_num_fields($result); // ����

$fieldinfo = mysqli_fetch_fields($result); //��ȡ�ֶ���

echo "Total <b style='color: red'>".$rows."</b> rows <b style='color: red'>".$colums."</b> colums<br/>";

echo "<table border='1'><tr>";
foreach ($fieldinfo as $val) {
    echo "<th>";
    echo $val->name;
    echo "</th>";
}
echo "</tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    for ($i = 0; $i < $colums; $i++) {
        echo "<td>$row[$i]</td>";
    }
    echo "</tr>";
}
echo "</table>";

$con->close();
