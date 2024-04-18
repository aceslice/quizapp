<?php
include_once("config/db.php");
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<?php include_once "header.php" ?>

<body>
    <h1><?php echo htmlspecialchars($_SESSION["role"]);
        ?></h1>
</body>

</html>