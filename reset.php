<?php
    require_once __DIR__."/config.php";

if (isset($databaseVehicleStore)) {
    $users = $databaseVehicleStore->findBy(["_id", ">", 0]);

    foreach ($users as $user) {
        $databaseVehicleStore->updateById($user["_id"], [
           "available" => true
        ]);
    }
}

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
        <main class="container white-text">
            Alle Fahrzeuge sind wieder verfügbar. <a href="index.php">Zur Startseite</a>
        </main>
    </body>
</html>