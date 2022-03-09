<?php
    // Database Settings
    use DevCoder\DotEnv;

    require dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

    (new DotEnv(__DIR__ . '/.env'))->load();

    define('DB_HOST', getenv('DB_HOST'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASS', getenv('DB_PASS'));
    define('DB_NAME', getenv('DB_NAME'));
    
    //define('DB_HOST', 'localhost');
    //define('DB_USER', 'root');
    //define('DB_PASS', '');
    //define('DB_NAME', 'MyDataBase');
    
    // APP ROOT
    define('APP_ROOT', dirname(dirname(__FILE__)));
    define('PUBLIC_ROOT', dirname(dirname(dirname(__FILE__))) . '/public');
    
    // URL ROOT
    if(strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false){
        define('URL_ROOT', 'http://'.$_SERVER['HTTP_HOST'].str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']));
    } else {
        define('URL_ROOT', 'https://'.$_SERVER['HTTP_HOST'].str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']));
    }
    //define('URL_ROOT', 'https://HeyMedical.com');
    
    // Nom du site
    define('SITE_NAME', 'HeyMedical');
    
	//Meta
    define('CARD_DESCRIPTION', 'Search for your diseases and find an answer');
    define('CARD_IMAGE', 'https://');

    define('TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6IjUxNDFkMjgyLTQyNTItNDU1Ni05NzQyLTRiNGE3ZmZlODY4YkBsb3VsZS5tZSIsInJvbGUiOiJVc2VyIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc2lkIjoiNzMyMCIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvdmVyc2lvbiI6IjEwOSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGltaXQiOiIxMDAiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXAiOiJCYXNpYyIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbGFuZ3VhZ2UiOiJlbi1nYiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvZXhwaXJhdGlvbiI6IjIwOTktMTItMzEiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL21lbWJlcnNoaXBzdGFydCI6IjIwMjEtMTEtMjYiLCJpc3MiOiJodHRwczovL2F1dGhzZXJ2aWNlLnByaWFpZC5jaCIsImF1ZCI6Imh0dHBzOi8vaGVhbHRoc2VydmljZS5wcmlhaWQuY2giLCJleHAiOjE2Mzc5NDcxMzYsIm5iZiI6MTYzNzkzOTkzNn0.MbiH-cvFbNY0EpgjjQ90wzyAVyu64Q7XJ6NB26TPaaM');