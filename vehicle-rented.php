<?php
    require_once __DIR__."/config.php";

    if (!isset($_SESSION["rentedVehicleID"])) {
        die("Du hast kein Fahrzeug gemietet!");
    }

    $vehicleCode = Vehicle::getCode($databaseVehicleStore, $_SESSION["rentedVehicleID"]);
?>

<html>
    <head>
        <title>Fahrradleihe</title>
        <meta charset="utf-8" />
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </head>

    <body class="blue darken-4">
        <main class="container">
            <div class="card-panel white lighten-4">
                <h3>Wenzels Fahrradleihe (Prototyp) - Fahrrad erfolgreich gemietet</h3>

                <p>Du hast jetzt ein Fahrrad gemietet. Der Code für das Schloss ist <b><?php echo $vehicleCode; ?></b></p>

                <a href="index.php" class="btn">Zur Startseite</a>
            </div>
        </main>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, {classes: "test123"});
            });
        </script>
    </body>
</html>