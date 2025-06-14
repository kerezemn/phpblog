<?php

require 'auth.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri) {
    case '/':
        $page = 'home';
        $title = 'Hakkımda';
        break;
    
    case '/login':
        $page = 'login';
        $title = 'Giriş yap';
        break;
    
    case '/logout':
        logout();
        header("Location: /", true, 301);
        exit;
    
    case '/cv':
        $page = 'cv';
        $title = "CV";
        break;

    case '/contact':
        $page = 'contact';
        $title = 'İletişim';
        break;
    
    case '/contact/success':
        $page = 'contact_success';
        $title = "Form gönderildi";
        break;
    
    case '/my-city':
        $page = 'my_city';
        $title = 'Şehrim';
        break;
    
    case '/my-team':
        $page = 'my_team';
        $title = "Takımım";
        break;
    
    case '/my-interests':
        $page = 'my_interests';
        $title = "İlgi alanlarım";
        break;
    
    case '/admin':
        $page = 'admin';
        $title = "Admin sayfası";
        break;

    default:
        http_response_code(404);

        $page = '404';
        $title = 'Hata';       
}

$view = __DIR__ . "/views/$page.php";
include __DIR__ . '/views/layout.php';