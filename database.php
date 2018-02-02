<?
/**
  * Функция для подключения к СУБД MySQL.
  * Функция не принимает никаких параметров.
  * Функция предназначена для использования, в основном,
  * с одной базой данных
  */
function connect() {
	// Объявляем переменные, в которых будут храниться параметры для подключения к СУБД
	$db_host = 'localhost';		// fam.mysql
	$db_user = 'root';	// fam_dbuser
	$db_pass = '';	// U03z5Tz6bu3L
	$db_name = 'support';			// Имя базы данных
	
	// Подключаемся к серверу
	$conn = mysql_connect($db_host, $db_user, $db_pass) or die("<p>Невозможно подключиться к СУБД: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Эта часть кода выполнится только в случае успешного подключения к серверу
	// Выбираем базу данных
	$db = mysql_select_db($db_name, $conn) or die("<p>Невозможно подключиться к базе данных: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Эта часть кода выполняется только в случае успешного подключения к БД
	// Указываем серверу, что данные, которые мы от него получаем, нам нужны в кодировке UTF-8
	$query = mysql_query("set names utf8", $conn) or die("<p>Невозможно выполнить запрос к базе данных: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
}
?>