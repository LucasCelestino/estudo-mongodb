<?php

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

$collection = (new MongoDB\Client)->teste->users;

$collection->deleteOne(['_id' => 1]);

$deletedResult = $collection->deleteMany(['email' => 'fulanoupdate@email.com']);

echo $deletedResult->getDeletedCount();


// deleteOne(['key'=>'value']) deleta um registro de acordo com o chave e valor informados
// deleteMany(['key'=>'value']) deleta todos os registros de acordo com o chave e valor informados