<?php


session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$conn = mysqli_connect(
    getenv('host'),
    getenv('USERNAME'),
    getenv('PASSWORD'),
    getenv('DBNAME');
);
