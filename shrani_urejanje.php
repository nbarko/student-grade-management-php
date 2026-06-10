<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);
    $vpisna = $_POST["vpisna"];
    $student = $_POST["student"];
    $predmet = $_POST["predmet"];
    $datum = $_POST["datum"];
    $ocena = $_POST["ocena"];

    // shrani posodobljene podatke, ki jih pridobi iz obrazca urejanje_ocen.php
    $sql = "UPDATE ocene SET vpisna=?, student=?, predmet=?, datum=?, ocena=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssii", $vpisna, $student, $predmet, $datum, $ocena, $id);
    mysqli_stmt_execute($stmt);
}

header("Location: prikaz_ocen.php");
exit;
?>