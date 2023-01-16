<?php

use Walber2903\PdoCourse\Domain\Model\Student;
use Walber2903\PdoCourse\Infrastructure\Persistence\ConnectionCreator;
require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students');

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);

$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );
    //echo "{$studentData['id']}: {$studendtData['name']}" .PHP_EOL;
}

var_dump($studentList);

