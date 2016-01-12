<?php
//Alustame sessionit
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
//laeme confi
$config = include(__DIR__ . './../config.php');
//laeme funktsioonid
include(__DIR__ . '/functions.php');

//uus pdo ühendus
$pdo = new PDO(
    'mysql:host=' . $config['mysql_hostname'] . ';dbname=' . $config['mysql_database'],
    $config['mysql_user'],
    $config['mysql_password']
);

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$file = __DIR__ . '/pages/' . $page . '.php';
if (file_exists($file)) {
    //Extractime funktsiooni sees, et get ja post parameetrid sisemisi global muutujaid üle ei kirjutaks
    $run = function ($page, $file, $input) {

        ob_start();
        extract($input);
        include($file);
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    };

    echo $run($page, $file, $_REQUEST);
} else {
    echo "<h2>Lehte ei ole!</h2>";
}
