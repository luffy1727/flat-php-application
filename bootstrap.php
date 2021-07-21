<?php

use Boozt\Database\DatabaseConnector;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$connection = (new DatabaseConnector())->getConnection();