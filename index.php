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
            <div class="card-panel white lighten-4">
                <h3>Wenzels Fahrradleihe (Prototyp)</h3>
                <p>Schnappe dir ein Fahrrad und fahre rum. Vielleicht ist ja noch eins frei?</p>

                <form>
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
                            <button type="submit" class="btn">Fahrrad mieten</button>
                        </div>
                    </div>
                </form>
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