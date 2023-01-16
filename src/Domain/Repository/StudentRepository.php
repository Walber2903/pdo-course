<?php

namespace Walber2903\PdoCourse\Domain\Repository;

use Walber2903\PdoCourse\Domain\Model\Student;

interface StudentRepository
{
    public function allStudents(): array;

    public function studentsBirthAt(\DateTimeInterface $birthDate): array;

    public function save(Student $student): bool;

    public function remove(Student $student): bool;
}