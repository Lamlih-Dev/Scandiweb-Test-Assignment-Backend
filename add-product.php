<?php
    require_once __DIR__ . "/API.php";

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    header("Access-Control-Allow-Methods: *");

    $API = new API;
    echo $API->POST();
?>  