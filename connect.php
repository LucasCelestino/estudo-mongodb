<?php

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

$collection = (new MongoDB\Client)->teste->users;

$insertOneResult = $collection->insertOne([
    'username' => 'fulano',
    'email' => 'fulano@email.com',
    'name' => 'Fulano Teste',
]);

var_dump($insertOneResult->getInsertedId());
