<?php
/**@var $router */
$router->setBasePath( 'phproject' );
//маршрути для обработки постов
$router->get( '', 'posts/index.php' );
$router->get( 'base', 'posts/index.php' );
$router->get( 'index', 'posts/index.php' );
$router->get( 'posts', 'posts/show.php' );
$router->get( 'posts/create', 'posts/create.php' );
$router->post( 'posts', 'posts/store.php' );
$router->delete( 'posts', 'posts/destroy.php' );

//Pages
$router->get( 'about', 'about.php' );
$router->get( 'contact', 'contact.php' );
//$routes = [
//    'phproject' => '/index.php',
//    'phproject/index' => '/index.php',
//    'phproject/about' => '/about.php',
//    'phproject/post' => '/post.php',
//    'phproject/posts/create' => '/post-create.php'
//];