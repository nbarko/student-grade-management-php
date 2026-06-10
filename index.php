<?php include("config.php"); ?>

<!-- obrazec za vnos ocen -->
<!DOCTYPE html>
    <html lang="sl">
    
        <head>
            <meta charset="UTF-8">
            <title>Vnos ocen</title>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/style.css">
        </head>

        <body>
            <h1>Vnos ocen študentov</h1>
                <form action="obdelava.php" method="post"> <!-- pošilja podatke z metodo POST na obdelava.php -->
                    <label for="vpisna">Vpisna številka:</label>
                    <input type="text" name="vpisna" id="vpisna" required>

                    <label for="student">Ime in priimek študenta:</label>
                    <input type="text" name="student" id="student" required>

                    <label for="predmet">Predmet:</label>
                    <input type="text" name="predmet" id="predmet" required>

                    <label for="datum">Datum:</label>
                    <input type="date" name="datum" id="datum" required>

                    <label for="ocena">Ocena (1–10):</label>
                    <input type="number" name="ocena" id="ocena" min="1" max="10" required>

                    <button type="submit">Shrani oceno</button>
                </form>
            <p><a href="prikaz_ocen.php">Preglej vnešene ocene</a></p>
        </body>

                    <!-- vsa polja imajo "required", kar pomeni, da morajo biti izpolnjena -->
    </html>