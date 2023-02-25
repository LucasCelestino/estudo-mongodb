<?php

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

$collection = (new MongoDB\Client)->teste->users;

$collection->insertOne([
    '_id' => 2,
    'username' => 'lucas',
    'email' => 'lucas@email.com',
    'name' => 'Lucas Celestino'
]);

$updateUser = $collection->updateOne(['_id' => 2], ['$set' => ['name' => 'Lucas Celestino Atualizado']]);

var_dump($updateUser);

$insertOneResult = $collection->insertOne([
    'username' => 'fulano 5',
    'email' => 'fulanoupdate@email.com',
    'name' => 'Fulano Teste',
]);

$insertOneResult = $collection->insertOne([
    'username' => 'fulano 6',
    'email' => 'fulanoupdate@email.com',
    'name' => 'Fulano Teste',
]);

$updatedUsers = $collection->updateMany(['email' => 'fulanoupdate@email.com'], [
    '$set' => ['name' => 'Fulano Teste Atualizado']
]);


$updateResult = $collection->replaceOne(
    ['email' => 'fulanoupdate@email.com'],
    ['email' => 'fulano@email.com']
);

// updateOne(['_id'=>2], ['$set'=>['name'=>'Lucas Celestino Atualizado']]): atualiza o name do registro de _id = 2 

// updateMany(['email' => 'fulanoupdate@email.com'], [
//     '$set' => ['name' => 'Fulano Teste Atualizado']
// ]) atualiza todos os name para Fulano Teste Atualizado onde o email for fulanoupdate@email.com

// replaceOne(['email' => 'fulanoupdate@email.com'],['email' => 'fulano@email.com']) semelhante ao update, mas ao invés de atualizar o registro, ele cria um novo

// updateOne(['_id'=>2], ['$set'=>['name'=>'Lucas Celestino Atualizado']], [ 'upsert'  =>  true ] ): Quando upsert é true e nenhum registro corresponde ao filtro especificado, a operação cria um novo registro e o insere