<?php

require_once 'vendor/autoload.php';

use Walber2903\PdoCourse\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$sqlDelete = 'DELETE FROM students WHERE id = ?;';

$prepareStatement = $pdo->prepare($sqlDelete);
$prepareStatement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($prepareStatement->execute());
