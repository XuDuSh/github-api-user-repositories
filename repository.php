<?php

require_once __DIR__ .'/vendor/autoload.php';

$client = new \Github\Client();
$login = $_GET['login'];
$repositories = $client->api('user')->repositories($login);
usort($repositories, function ($a, $b){
    return ($a['updated_at'] > $b['updated_at']) ? -1 : 1;
});
$cnt = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<a href="index.php"> Home </a>
<h2>Repositories</h2>

<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Updated date</th>
    </tr>
    <?php
    foreach ($repositories as $repository){
        $cnt ++;
        if ($cnt == 10)
            break;
        ?>
        <tr>
            <td><?= $cnt ?></td>
            <td><?= $repository['name']?></td>
            <td><?= $repository['updated_at']?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
