<?php

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "university_db");
define("DB_PORT", 3306);

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($connection && $connection->connect_error) {
    echo "Connection error: " . $connection->connect_error;
} elseif ($connection) {
    echo "Connection successful";
}