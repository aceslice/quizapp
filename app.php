<?php
include_once("config/db.php");
session_start();
$role = $_SESSION["role"];
$email = $_SESSION["email"];
$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];
$unique_id = $_SESSION["unique_id"];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include_once "header.php" ?>

<body>
    <h1>WELCOME HOME <?php echo $firstname ?> <?php echo $lastname ?></h1>
    <br>
    <p>Role: <?php echo $role ?></p>
    <br>
    <p>Email: <?php echo $email ?></p>
    <br>
    <p>Unique ID: <?php echo $unique_id ?></p>

</body>

</html>