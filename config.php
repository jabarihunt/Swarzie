<?php

// Composer autoload file
require(__DIR__ . '/vendor/autoload.php');

// Get .env settings
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Site settings
$baseURL = $_ENV['BASE_URL'];

// Database settings
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);

if(!session_id()){
 session_start();
}

$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
