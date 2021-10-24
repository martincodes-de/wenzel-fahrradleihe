<?php

session_start();

require_once __DIR__."/database/SleekDB.php";
require_once __DIR__."/classes/vehicle.php";

$databasePath = __DIR__."/database-data";

$databaseVehicleStore = new SleekDB\Store("vehicles", $databasePath);
$databaseRentStore = new SleekDB\Store("rents", $databasePath);
