<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sprejme id preko URL-ja
    $sql = "DELETE FROM ocene WHERE id = ?"; // izvede DELETE za ta id
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: prikaz_ocen.php"); // preusmeri nazaj na prikaz_ocen.php
exit;
?>