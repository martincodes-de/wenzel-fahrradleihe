<?php

use \SleekDB\Store;

class Vehicle {
    public string $name;
    public int $id = 0;
    public SleekDB\Store $stored;

    public static function getAll(SleekDB\Store $store, $onlyVariable = false): array {
        if ($onlyVariable) {
            return $store->findBy(["available", "=", true]);
        }

        return $store->findAll();
    }

    public static function isVehicleAvailable(SleekDB\Store $store, int|string $id): bool {
        $vehicleCount = $store->findBy([
                ["_id", "=", intval($id)],
                ["available", "=", true]
            ]);

        if (count($vehicleCount) === 1) {
            return true;
        }

        return false;
    }

    public static function setAvailabilityToFalse(SleekDB\Store $store, int|string $id) {
        $store->updateById($id, ["available" => false]);
    }

    public static function getCode(SleekDB\Store $store, int|string $id): int {
        $vehicle = $store->findById($id);

        return $vehicle["code"];
    }
}