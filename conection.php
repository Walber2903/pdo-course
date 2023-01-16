<?php

use Walber2903\PdoCourse\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

echo 'Conected!';

$pdo -> exec('CREATE TABLE students (id INTEGER PRIMARY KEY , name TEXT, birth_date TEXT);');
