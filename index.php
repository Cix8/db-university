<?php
require_once __DIR__ . "/Department.php";
require_once __DIR__ . "/database.php";

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
        <h2>Dipartimenti</h2>

        <ul>
            <?php foreach ($dep_array as $single_department) { ?>
                <li>
                    <h3><?php echo $single_department->name; ?></h3>
                    <a href="department_info.php/?id=<?php echo $single_department->id; ?>">Altre info</a>
                </li>
            <?php } ?>
        </ul>
    </main>

</body>

</html>