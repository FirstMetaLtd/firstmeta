<?php
require __DIR__ . '/database.php';
require __DIR__ . '/session_handler.php';
register_db_session_handler($con);
session_start();
ini_set("display_errors", 1);
require __DIR__ . '/functions.php';


?>