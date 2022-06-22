<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";

$stmt = $connection->prepare("SELECT * FROM `departments` WHERE `id`=?");
$stmt->bind_param("d", $id);
$id = $_GET["id"];
$stmt->execute();

$result_dep = $stmt->get_result();
$info_array = [];

if ($result_dep && $result_dep->num_rows > 0) {
    while($row = $result_dep->fetch_assoc()) {
        $single_dep = new Department($row["id"], $row["name"]);
        $single_dep->setInfo($row["address"], $row["phone"], $row["email"], $row["website"], $row["head_of_department"]);
        $info_array[] = $single_dep;
    }
} elseif ($result_dep) {
    echo "There are no results";
} else {
    echo "Query error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <main>
        <h2>
            <?php echo $info_array[0]->name; ?>
        </h2>

        <ul>
            <?php foreach ($info_array[0]->getInfo() as $key => $value) { ?>
                <li>
                    <span>
                        <?php
                            if (strpos($key, "_")) {
                                $key = str_replace("_", " ", $key);
                            }
                            echo ucfirst($key); 
                        ?>:
                        <?php 
                            echo $value; 
                        ?>
                    </span>
                </li>
            <?php } ?>
        </ul>
    </main>

</body>
</html>