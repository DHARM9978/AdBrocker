<?php
function Db_Connection()
{
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'ad_brokers');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn == false) {
        die("Error : Cannot Connect with Database");
    }

    return $conn;
}
