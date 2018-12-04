<?php

$request = $_SERVER['REQUEST_URI'];


if ($request == '/contato') {
    return require_once ROOT_PATH."/controllers/ContactController.php";
}

if ($request == '/') {
    return require_once ROOT_PATH."/views/home.php";
}

echo "<br>";

print_r($request);
