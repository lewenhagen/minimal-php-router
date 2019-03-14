<?php
include("functions.php");

$request = $_SERVER["REQUEST_URI"];
$data = file_get_contents(__DIR__ . "/data/items.json");

header("Content-Type: application/json");

switch ($request) {
    case "/":
    case "":
        include(__DIR__ . "/routes/index.php");
        break;
    case "/chili":
        $json_data = json_decode($data, true);
        foreach ($json_data as $key => $value) {
            if ($json_data[$key]["type"] == "Chili") {
                echo json_encode($json_data[$key]) . "\n";
            }
        }
        break;
    case "/gurka":
        $json_data = json_decode($data, true);
        foreach ($json_data as $key => $value) {
            if ($json_data[$key]["type"] == "Gurka") {
                echo json_encode($json_data[$key]) . "\n";
            }
        }
        break;
    case "/all":
        echo $data;
        break;
    default:
        include(__DIR__ . "/routes/404.php");
        break;
}
