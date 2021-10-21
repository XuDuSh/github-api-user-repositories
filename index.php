<?php

require_once __DIR__ .'/vendor/autoload.php';

$client = new \Github\Client();
$users = $client->api('user')->all();
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

<h2>HTML Table</h2>

<table>
    <tr>
        <th>#</th>
        <th>Username</th>
    </tr>
    <?php
        foreach ($users as $user){
            $cnt ++;
            if ($cnt == 10)
                break;
    ?>
    <tr>
        <td><?= $cnt ?></td>
        <td><a href="repository.php?login=<?= $user['login']?>" role="button">
                <?= $user['login'] ?></a></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>

