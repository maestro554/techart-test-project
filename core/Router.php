<?php

class Router {
    private $routes = [];

    public function add($url, $callback) {
        $this->routes[$url] = $callback;
    }

    public function run() {
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        foreach ($this->routes as $route => $callback) {
            if ($uri === $route) {
                if (is_callable($callback)) {
                    call_user_func($callback);
                }
                return;
            }
        }
        echo "404 Not Found";

        var_dump($uri);
        var_dump($this->routes);
        die;
    }
}