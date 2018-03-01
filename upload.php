<?php
require_once('database.php');
connect();
$print_date = $_POST['element_year']."-".$_POST['element_month']."-".$_POST['element_day'];
$print_date = date_create_from_format('Y-m-d', $print_date);

$uploaddir    = "foto/";
$imgupload=false;
$uploadedFile = $uploaddir . basename($_FILES["image_file"]["name"]);
if (is_uploaded_file($_FILES["image_file"]["tmp_name"])) {
    if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $uploadedFile)) {
        $data = $_FILES["image_file"];
        $imgupload=true;
    } else {
        $data['errors'] = "Во время загрузки файла произошла ошибка";
    }
} else {
    $data['errors'] = "Файл не  загружен";
}

$user_name= $_POST['element_3'];
$db_table_to_show = 'main_sup';
$strSQL = "INSERT INTO main_sup(";
$strSQL = $strSQL . "stl_ind, ";
$strSQL = $strSQL . "date, ";
$strSQL = $strSQL . "name, ";
$strSQL = $strSQL . "image, ";
$strSQL = $strSQL . "stl_names, ";
$strSQL = $strSQL . "ind)";
$strSQL = $strSQL . "VALUES (";
$strSQL = $strSQL . "'"."', ";
$strSQL = $strSQL . "'".date_format($print_date, 'Y-m-d')."', ";
$strSQL = $strSQL . "'".$user_name."', ";
$strSQL = $strSQL . "'".$uploadedFile."', ";
$strSQL = $strSQL . "'".$_POST['file_list']."', ";
$strSQL = $strSQL . "'"."') ";
mysql_query($strSQL) or die("<p>Невозможно выполнить запрос: " .$strSQL . ". Ошибка произошла в строке " . __LINE__ . "</p>");
$res = '<script type="text/javascript">';
$res.= 'window.parent.handleResponse();';
$res.= "</script>";
echo $res;
?>
<html>
<head>
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
</head>
<body>
</body>