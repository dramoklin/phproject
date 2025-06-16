<?php
require CONFIG_PATH .'/routes.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
if (array_key_exists($uri,$routes) || file_exists(require CONTROLLERS_PATH . "/{$routes[$uri]}")){
        require CONTROLLERS_PATH . "/{$routes[$uri]}";
}else {
    abort();
}
