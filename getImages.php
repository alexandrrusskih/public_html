
<?php
require_once 'database.php';
$n = $_GET["n"];


// $qr_result = "select * from main_sup ORDER BY date DESC LIMIT " . strval($n) . "," . strval($n + 8);
// $query = mysql_query($qr_result) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");

$sql = "SELECT * FROM `main_sup` ORDER BY date DESC LIMIT ?, ?";
$arg= [$n,($n+8)];
$title = DB::run($sql,$arg);



$response = "";
while ($row = $title->fetch(PDO::FETCH_LAZY)){
// while ($data = mysql_fetch_array($query)) {
    $imga = $row['image'];
    $response = $response . '"' . $imga . '";';
}
echo $response;
?>