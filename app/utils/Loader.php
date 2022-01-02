<?php

require_once "app/Autoloader.php";
__load_all_classes();

function __init_sql(){
    SQLManager::$database = new \MySQLi("p:127.0.0.1", "root", "root", SQLManager::DATABASE_LETS_FREERUN);
}

function __load_all_spots(){
    foreach (SQLManager::get_data("SELECT * FROM spots") as $key => $value){
        $decoded = decode_data($value["location"]);
        SpotManager::$current_spots_list[$value["uid"]] = new Spot($value["name"], new Location($decoded[0], $decoded[1], $decoded[2]), new UID((int)$value["uid"]));
    }
}