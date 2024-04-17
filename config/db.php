<?php
$conn = mysqli_connect("localhost", "root", "", "quizapp");
if (!$conn) {
    die("" . mysqli_connect_error());
}
