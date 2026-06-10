<!-- poveže aplikacijo z MySQL bazo -->

<?php
$host = "localhost";
$user = "your_database_user";
$pass = "your_database_password";
$dbname = "your_database_name";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>