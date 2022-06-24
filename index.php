<?php
header("Access-Control-Allow-Origin: *");
define("pastaProjeto", "programador_junior-master");

function checkRequest()
{
    $method = $_SERVER["REQUEST_METHOD"];
    switch ($method) {
        case 'POST':
            $answer = 'post';
            break;
        case 'GET':
            $answer = 'get';
            break;
        default:
            set_error_handler($method);
            break;
    }
    return $answer;
}

$answer = checkRequest();
$request = $_SERVER["REQUEST_URI"];
"http://localhost/programador_junior-master";

switch ($request) {
    case '/' . pastaProjeto:
        require __DIR__ . "/lib/View/index.html";
        break;

    default:
        require __DIR__ . "/lib/View/index.html";
        break;
}
