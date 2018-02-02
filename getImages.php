
<?php
require_once 'database.php';
connect();
$n = $_GET["n"];
$qr_result = "select * from main_sup ORDER BY date DESC LIMIT " . strval($n) . "," . strval($n + 8);
$query = mysql_query($qr_result) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
$response = "";
while ($data = mysql_fetch_array($query)) {
    $imga = $data[image];
    $response = $response . '"' . $imga . '";';
}
echo $response;
?>