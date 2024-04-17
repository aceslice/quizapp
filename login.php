<?php
session_start();
if (isset($_SESSION["email"]) && $_SESSION["unique_id"]) {
    header("Location: app.php");
}
include_once "config/db.php";
$errors = array("email" => "");
if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
    if (!empty($email) && !empty($password)) {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '$password'");
        $row = mysqli_fetch_assoc($result);
        if (is_array($row) && !empty($row)) {
            $_SESSION["email"] = $row["email"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["unique_id"] = $row["unique_id"];
            $_SESSION["firstname"] = $row["firstname"];
            $_SESSION["lastname"] = $row["lastname"];
            if (isset($_SESSION["email"]) && $_SESSION["unique_id"]) {
                header("Location: app.php");
            }
        } else {
            $errors["email"] = "<div class='error-text'>Incorrect Email or Password</div>";
        }
    } else {
        $errors["email"] = "<div class='error-text'>Email and Password required</div>";
    }
}
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Welcome back</header>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <?php echo $errors["email"] ?>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to App">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>

</body>

</html>