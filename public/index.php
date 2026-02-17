<?php

require_once __DIR__ . "/../core/Router.php";
require_once __DIR__ . "/../app/controller/newsController.php";

$router = new Router();

$router->add("/", function(){
    $controller = new NewsController();
    $controller->index();
});

$router->add("/article", function(){
    if (isset($_GET["id"])) {
        $controller = new NewsController();
        $controller->show((int)$_GET["id"]);
    } else {
        echo "404 Not Found";
    }
   
});

$router->run();