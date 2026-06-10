<?php
include("config.php");

$id = intval($_GET['id']); // prikaže obrazec za urejanje izbrane ocene
$sql = "SELECT * FROM ocene WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Uredi oceno</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Uredi oceno</h1>
    <form action="shrani_urejanje.php" method="post"> <!-- obrazec pošlje na shrani_urejanje.php -->
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label>Vpisna:</label>
        <input type="text" name="vpisna" value="<?= $data['vpisna'] ?>" required>
        <label>Študent:</label>
        <input type="text" name="student" value="<?= $data['student'] ?>" required>
        <label>Predmet:</label>
        <input type="text" name="predmet" value="<?= $data['predmet'] ?>" required>
        <label>Datum:</label>
        <input type="date" name="datum" value="<?= $data['datum'] ?>" required>
        <label>Ocena:</label>
        <input type="number" name="ocena" value="<?= $data['ocena'] ?>" required>
        <button type="submit">Shrani spremembe</button>
    </form>
</body>
</html>