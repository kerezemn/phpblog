<?php

require 'auth.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri) {
    case '/logout':
        logout();

    case '/':
        $page = 'home';
        $title = 'Ana sayfa';
        break;
    
    case '/login':
        $page = 'login';
        $title = 'Giriş yap';
        break;
    
    case '/about':
        $page = 'about';
        $view = __DIR__ . '/views/home.php';
        break;
    
    case '/contact':
        $page = 'contact';
        $title = 'İletişim';
        break;

    default:
        http_response_code(404);

        $page = '404';
        $title = 'Hata';       
}

$view = __DIR__ . "/views/$page.php";
include __DIR__ . '/views/layout.php';