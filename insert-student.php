<?php

use Walber2903\PdoCourse\Domain\Model\Student;
use Walber2903\PdoCourse\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    'Walber Araujo',
    new \DateTimeImmutable('1988-01-20')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
if ($statement->execute()) {
    echo "Aluno Incluido!";
};