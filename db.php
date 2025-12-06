<?php

define('DB_HOST', 'localhost:8889'); //Make sure it is on local host 8889 instead of 8888. This will cause an error.
define('DB_USER', 'root');
define('DB_PASS', 'root'); //XAMPP will be an empty string. (' ')
define('DB_NAME', 'full_stack_todo_app');

$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$mysqli) {
    die('Database connection failed: ' . mysqli_connect_error());
}
mysqli_set_charset($mysqli, 'utf8mb4');
