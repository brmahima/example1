<?php

DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'rest');

date_default_timezone_set('UTC');


$connect= @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,DATABASE_NAME);

if (!$connect) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>
