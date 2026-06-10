<?php
include("config.php");

// Obdelava iskanja
$iskanje = isset($_GET['iskanje']) ? trim($_GET['iskanje']) : '';

if ($iskanje !== '') { // prikaže tabelo z vsemi ocenami in omogoča iskanje
    $sql = "SELECT * FROM ocene WHERE student LIKE ? OR predmet LIKE ? ORDER BY datum DESC";
    $stmt = mysqli_prepare($conn, $sql);
    $param = "%$iskanje%";
    mysqli_stmt_bind_param($stmt, "ss", $param, $param);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM ocene ORDER BY datum DESC";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Pregled ocen</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Vse vnesene ocene</h1>

    <!-- Iskalni obrazec -->
    <form method="get" class="mb-4 text-center">
        <input type="text" name="iskanje" placeholder="Išči študenta ali predmet"
               value="<?= htmlspecialchars($iskanje) ?>"
               class="form-control w-50 mx-auto">
    </form>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Vpisna št.</th>
                    <th>Študent</th>
                    <th>Predmet</th>
                    <th>Datum</th>
                    <th>Ocena</th>
                    <th>Uredi</th>
                    <th>Izbriši</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($row["vpisna"]) ?></strong></td>
                        <td><?= htmlspecialchars($row["student"]) ?></td>
                        <td><?= htmlspecialchars($row["predmet"]) ?></td>
                        <td><?= date("j.n.Y", strtotime($row["datum"])) ?></td>
                        <td><?= htmlspecialchars($row["ocena"]) ?></td>
                        <td>
                            <a href="urejanje_ocen.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning">Uredi</a>
                        </td>
                        <td>
                            <a href="izbris_ocen.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger"
                               onclick="return confirm('Ali res želiš izbrisati to oceno?')">×</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Ni najdenih ocen.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-primary">Nazaj na vnos ocen</a>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>