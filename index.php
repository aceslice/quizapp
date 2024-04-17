<?php
include_once("config/db.php");
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: app.php");
}
if (isset($_POST["submit"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $ran_id = mysqli_real_escape_string($conn, rand(time(), 100000000));
    $password = mysqli_real_escape_string($conn, md5($password));
    $result = mysqli_query($conn, "INSERT INTO users(firstname, lastname, email, password, role, unique_id) VALUES('$fname', '$lname', '$email', '$password', '$role', '$ran_id')");
    if ($result) {
        $_SESSION["email"] = $email;
        $_SESSION["role"] = $role;
        $_SESSION["unique_id"] = $ran_id;
        $_SESSION["firstname"] = $fname;
        $_SESSION["lastname"] = $lname;
    }
}
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Create a new account</header>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field select">
                    <label>Choose Role</label>
                    <select name="role">
                        <option value="instructor">
                            Instructor
                        </option>
                        <option value="student">
                            student
                        </option>
                    </select>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to App">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>

</body>

</html>