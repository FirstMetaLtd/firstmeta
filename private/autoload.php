<?php 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);

// Secure session configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_strict_mode', 1);

session_start();

// Production: errors logged, never displayed to users
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

require 'admin/private/database.php';
require 'admin/private/functions.php';


function getUserIp(){
    switch (true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) :return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

    $currentdate=date('y-m-d');
    $currentyear = date('Y', strtotime($currentdate));
    $currentday = date('j', strtotime($currentdate));
    $currentmonth = date('F', strtotime($currentdate));

    $set=get_settings($con);
?>