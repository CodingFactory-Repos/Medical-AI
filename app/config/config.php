<?php
    // Database Settings
    define('DB_HOST', '');
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_NAME', '');
    
    //define('DB_HOST', 'localhost');
    //define('DB_USER', 'root');
    //define('DB_PASS', '');
    //define('DB_NAME', 'MyDataBase');
    
    // APP ROOT
    define('APP_ROOT', dirname(dirname(__FILE__)));
    
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