<?php

use Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Walber Araujo',
    new DateTimeImmutable('1988-01-20')
);

echo $student->age();