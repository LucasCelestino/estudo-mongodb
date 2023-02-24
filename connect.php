<?php

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

$client = new MongoDB\Client('mongodb://localhost:27017');

var_dump($client);
