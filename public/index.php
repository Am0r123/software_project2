<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/utils/autoload.php';

define('BASE_URL', '/testing');

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
$urlParts = explode('/', $url);

$controllerName = ucfirst($urlParts[0]) . 'Controller';
$methodName = $urlParts[1] ?? 'index';
$params = array_slice($urlParts, 2);

try {
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $params);
        } else {
            throw new Exception("Method $methodName not found in $controllerName.");
        }
    } else {
        throw new Exception("Controller $controllerName not found.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
