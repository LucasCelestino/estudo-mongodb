<?php

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

$collection = (new MongoDB\Client)->teste->users;

$insertOneResult = $collection->insertOne([
    'username' => 'fulano 4',
    'email' => 'fulano@email.com',
    'name' => 'Fulano Teste',
]);

var_dump($insertOneResult->getInsertedId());

// insertOne([]): insere um registro
// insertMany([]): insere muitos registros
// getInsertedId/s(): retorna os ultimos ou o ultimo id inserido -->