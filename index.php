<?php
require_once 'config/config.php';
require_once 'controllers/HomeController.php';

$controller = new HomeController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'fetch':
        $controller->fetchData();
        break;
    case 'result':
        $controller->showResult();
        break;
    default:
        $controller->index();
        break;
}