<?php
    require_once __DIR__."/config.php";
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

            <?php
                if (isset($_POST["rentVehicle"]) && isset($_POST["vehicle"])) {
                    $isVehicleAvailable = Vehicle::isVehicleAvailable($databaseVehicleStore, $_POST["vehicle"]);
                }

                if (isset($isVehicleAvailable) && $isVehicleAvailable === true) {
                    Vehicle::setAvailabilityToFalse($databaseVehicleStore, $_POST["vehicle"]);

                    $_SESSION["rentedVehicleID"] = $_POST["vehicle"];
                }
            ?>

            <?php if(isset($isVehicleAvailable) && $isVehicleAvailable === true): ?>
                <div class="card-panel green lighten-2">Das Fahrrad ist mietbar und hast es gemietet! Du wirst gleich zum Code weitergeleitet.</div>
                <meta http-equiv="refresh" content="3;url=vehicle-rented.php">
            <?php endif; ?>

            <?php if(isset($isVehicleAvailable) && $isVehicleAvailable === false): ?>
                <div class="card-panel red lighten-2">Das Fahrrad ist nicht mietbar.</div>
            <?php endif; ?>

            <div class="card-panel white lighten-4">
                <h3>Wenzels Fahrradleihe (Prototyp)</h3>
                <p>Schnappe dir ein Fahrrad und fahre rum. Vielleicht ist ja noch eins frei?</p>

                <form method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="vehicle" id="vehicle">
                                <option value="" disabled selected>Wähle ein Fahrrad aus</option>

                                <?php foreach(Vehicle::getAll($databaseVehicleStore, true) as $vehicle): ?>
                                    <option value="<?php echo $vehicle["_id"]; ?>"><?php echo $vehicle["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label for="vehicle">Freie Leihfahrräder</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input value="" id="name" type="text" class="validate" required>
                            <label for="name">Dein Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input value="" id="address" type="text" class="validate" required>
                            <label for="address">Deine Adresse</label>

                            <br><br>
                            <button type="submit" name="rentVehicle" class="btn">Fahrrad mieten</button>
                        </div>
                    </div>
                </form>

                <a href="reset.php" class="btn red">Alle Fahrzeuge zurücksetzen</a>
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