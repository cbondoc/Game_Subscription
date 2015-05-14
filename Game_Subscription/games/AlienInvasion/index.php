<?php
session_start();
require_once ('../../config.php');

$users_id = $_SESSION['id'];

$stmt = $db_link->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");

$stmt->bind_param("s", $users_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$access = $row['access'];
$rem_subscription = $row['rem_subscription'];

if (isset($access)) {
    if ($rem_subscription > 0) {
        
    } else {
        header('Location: ../../not_allowed.php');
    }
} else {
    header('Location: ../../not_allowed.php');
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Alien Invasion</title>
        <link rel="stylesheet" href="base.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    </head>
    <body>
        <div id='container'>
            <canvas id='game' width='320' height='480'></canvas>
        </div>
        <script src='engine.js'></script>
        <script src='game.js'></script>
    </body>
</html>


