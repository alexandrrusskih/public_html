
<?php
 $dir = "foto/";
 $src = $_GET["n"];
 $response = $dir.$src.';';
$i = 1;
$r = str_ireplace(".jpg", "_" . $i . ".jpg", $src);
if (file_exists($dir . $r)) {
    while (file_exists($dir . $r)) {
        $response = $response . $dir . $r . ';';
        $i++;
        $r = str_ireplace(".jpg", "_" . $i . ".jpg", $src);
    }
}
echo $response;
?>



