<?php
require 'private/autoload.php';
session_destroy();
header('location:login');
die;
?>