<?php
include_once("config/db.php");
session_start();
$role = $_SESSION["role"];
$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];

// if (!isset($_SESSION["unique-id"])) {
//     header("Location: login.php");
// }
$desc = $role === "instructor" ? "<p>Continue to your dashboard and manage your quizzes.</p>
<p> You can also assign quizzes to students.</p>" : "<p>Continue to your dashboard where you can take quizes on various subjects.</p>
<p>You can also take quizzes assigned to you by your instructor.
</p>";
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include_once "header.php" ?>
    <style>
    button {
        height: 45px;
        border: none;
        color: #fff;
        font-size: 17px;
        background: #333;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 13px;
    }

    p {
        margin-bottom: 8px;
        color: gray;
    }

    a {
        text-align: center;
        margin: 10px 0;
        font-size: 17px;
        color: #333;
    }
    </style>

<body>

    <div class="wrapper" style="padding: 20px;">
        <p>Welcome,</p>
        <h3 style="margin-bottom: 20px;"> <?php echo htmlspecialchars($firstname) ?>
            <?php echo htmlspecialchars($lastname) ?></h3>
        <?php echo $desc ?>
        <a href="logout.php">Logout</a>
        <a href="dashboard.php">
            <button style="width: 100%;">
                Continue to Dashboard
            </button></a>
    </div>

</body>

</html>