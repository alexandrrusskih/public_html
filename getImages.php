
<?php
require_once 'database.php';
$n = $_GET["n"];

$sql = "SELECT * FROM `main_sup` ORDER BY ind DESC LIMIT ?, ?";
$arg = [$n, ($n + 8)];
$title = DB::run($sql, $arg);
$response = "";
while ($row = $title->fetch(PDO::FETCH_LAZY)) {
    $imga = $row['image'];
    $response = $response . '"' . $imga . '";';
}
echo $response;
?>