<?php
include("config.php");

// prejme podatke iz index.php in jih shrani v bazo
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vpisna = $_POST["vpisna"];
    $student = $_POST["student"];
    $predmet = $_POST["predmet"];
    $datum = $_POST["datum"];
    $ocena = $_POST["ocena"];

    $sql = "INSERT INTO ocene (vpisna, student, predmet, datum, ocena)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql); // z mysqli_prepare pripravi varno SQL poizvedbo
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $vpisna, $student, $predmet, $datum, $ocena); // doda vrednosti
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $uspeh = true; // če je vnos uspešen, nastavi $uspeh = true
    } else {
        $uspeh = false;
    }
}

mysqli_close($conn);
?>

<!-- prikaz sporočila (uspešno ali neuspešno) -->
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Obdelava</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-center py-5">
    <div class="container">
        <?php if ($uspeh): ?>
            <div class="alert alert-success" role="alert">
                Ocena je bila uspešno shranjena.
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Napaka pri shranjevanju ocene.
            </div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="index.php" class="btn btn-outline-primary me-2">Nazaj na vnos</a>
            <a href="prikaz_ocen.php" class="btn btn-outline-secondary">Poglej ocene</a>
        </div>
    </div>
</body>
</html>