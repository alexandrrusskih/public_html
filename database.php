<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'support');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHAR', 'utf8');

class DB
{
    protected static $instance = null;

    public function __construct() {}
    public function __clone() {}

    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => FALSE,
            );
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }
    
    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}



/**
  * Функция для подключения к СУБД MySQL.
  * Функция не принимает никаких параметров.
  * Функция предназначена для использования, в основном,
  * с одной базой данных
  */
function connect() {
	// Объявляем переменные, в которых будут храниться параметры для подключения к СУБД
	$db_host = 'localhost';		// Сервер
	$db_user = 'root';	// Имя пользователя
	$db_pass = '';	// Пароль пользователя
	$db_name = 'support';			// Имя базы данных


	// $id=1;
	// $name = DB::run("SELECT artikul FROM claim_table WHERE ind=?", [$id])->fetchColumn();
	// echo ($name);


	
	// Подключаемся к серверу
//	$conn = mysql_connect($db_host, $db_user, $db_pass) or die("<p>Невозможно подключиться к СУБД: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Эта часть кода выполнится только в случае успешного подключения к серверу
	// Выбираем базу данных
//	$db = mysql_select_db($db_name, $conn) or die("<p>Невозможно подключиться к базе данных: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Эта часть кода выполняется только в случае успешного подключения к БД
	// Указываем серверу, что данные, которые мы от него получаем, нам нужны в кодировке UTF-8
	//$query = mysql_query("set names utf8", $conn) or die("<p>Невозможно выполнить запрос к базе данных: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
}


// session_start();

// $_SESSION['c_page']='0';




?>