<?php

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

$collection = (new MongoDB\Client)->teste->users;

$user = $collection->findOne(['_id' => 1]);

// var_dump($user);

$manyUsers = $collection->find(['username' => 'fulano']);

// foreach ($manyUsers as $user) {
//     var_dump($user->email);
// }

$usersLimited = $collection->find(
    [
        'email' => 'fulano@email.com',
    ],
    [
        'limit' => 3,
    ]
);

// foreach ($usersLimited as $user) {
//     var_dump($user->username);
// }

$usersSort = $collection->find(
    [],
    [
        'sort' => ['_id' => 1],
    ]
);

// foreach ($usersSort as $user) {
//     echo $user->_id;
//     echo '<br>';
// }

$usersRegex = $collection->find([
    'username' => new MongoDB\BSON\Regex("^fu")
]);
$usersRegex2 = $collection->find([
    'username' => ['$regex' => '^fu']
]);

foreach ($usersRegex as $user) {
    echo $user->username;
    echo '<br>';
}


// findOne([]): retorna um registro
// find([]): retorna varios registros
// find([],['limit'=>value]): limita o numero de registros retornados
// find([],['sort'=>value]): ordena os registros pelo value em sort
// find(['username'=>new MongoDB\BSON\Regex("^fu")]): retorna todos os registros que começam com "fu" no campo username
// find(['username' => ['$regex' => '^fu']]): outra forma de escrever a mesma consulta regex