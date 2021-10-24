<?php

use \SleekDB\Store;

class Vehicle {
    public string $name;
    public int $id = 0;
    public \SleekDB\Store $stored;

    public static function getAll(\SleekDB\Store $store, $onlyVariable = false): array {
        if ($onlyVariable) {
            return $store->findBy(["available", "=", true]);
        }

        return $store->findAll();
    }
}