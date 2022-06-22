<?php
require_once __DIR__ . "/Department.php";

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "university_db");
define("DB_PORT", 3306);

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($connection && $connection->connect_error) {
    echo "Connection error: " . $connection->connect_error;
    die();
}

$sql = "SELECT * FROM `departments`";
$result = $connection->query($sql);
$dep_array = [];

if ($result && $result->num_rows > 0) {
    while($single_row = $result->fetch_assoc()) {
        $single_dep = new Department($single_row["id"], $single_row["name"]);
        $single_dep->setInfo($single_row["address"], $single_row["phone"], $single_row["email"], $single_row["website"], $single_row["head_of_department"]);
        $dep_array[] = $single_dep;
    }
} elseif ($result) {
    echo "There are no results";
} else {
    echo "Query error";
}