<?php
/**
 * * 159.339 Internet Programming 2018 - Assignment-2
 *
 * This is index.php file. Runs Model-View-Controller Banking system simulator .
 *
 * @package team/a2
 *
 * Student ID: 16242934  - Student Name: Junghoe(Peter) Hwang
 * Student ID: 16226114  - Student Name: Erdem Alpkaya
 * Student ID: 96066919  - Student Name: Robert Harper
 *
 * Assignment: 2   Date: 30 September 2018
 * System: PHP 7.1
 *
 * Code guidelines: PSR-1, PSR-2
 *
 * FRONT CONTROLLER - Responsible for URL routing and User Authentication
 *
 * Code foundation by:
 * @author  Andrew Gilman <a.gilman@massey.ac.nz>
 *
 *
 * @author  Junghoe Hwang <after10y@gmail.com>
 * @author Erdem Alpkaya <erdemalpkaya@gmail.com>
 * @author  Robert Harper   <l.attitude37@gmail.com>
 **/
namespace team\a2;
date_default_timezone_set('Pacific/Auckland');
const APP_ROOT = __DIR__;

require 'vendor/autoload.php';
require 'router.php';

$route = $router->matchCurrentRequest();

// If route was dispatched successfully - return
if ($route) {
    $accessLogMessage = $_SERVER['REMOTE_ADDR'] . ":" .
        $_SERVER['REMOTE_PORT'] . " " .
        "Dispatched " .
        $router->generate($route->getName(), $route->getParameters()) .
        " using " . $_SERVER['REQUEST_METHOD'] . " successfully.";
    error_log($accessLogMessage, 4);
    // true indicates to webserver that the route was successfully served
    return true;
}

// Otherwise check if the request is for a static resource
$info = parse_url($_SERVER['REQUEST_URI']);
// check if its an allowed static resource type and that the file exists
if (preg_match('/\.(?:png|jpg|jpeg|css|js)$/', "$info[path]")
    && file_exists("./$info[path]")) {
    // false indicates to web server that the route is for a static file - fetch it and return to client
    return false;
} else {
    $accessLogMessage = $_SERVER['REMOTE_ADDR'] . ":" .
        $_SERVER['REMOTE_PORT'] . " " .
        "URL " . $_SERVER['REQUEST_URI'] . " didn't match a route or static file.";
    error_log($accessLogMessage, 4);
    header("HTTP/1.0 404 Not Found");
    // Custom error page
    // require 'static/html/404.html';
    return true;
}
