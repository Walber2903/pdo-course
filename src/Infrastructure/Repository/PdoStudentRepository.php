<?php

namespace Walber2903\PdoCourse\Infrastructure;

use DateTimeInterface;
use Walber2903\PdoCourse\Domain\Model\Student;
use Walber2903\PdoCourse\Domain\Repository\StudentRepository;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $sqlQuery = 'SLECT * FROM students;';
        $statement = $this->connection->query($sqlQuery);

        return $this->hydrateStudents($statement);
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {
        $sqlQuery = 'SELECT * FROM students WHERE birth_date = ?;';
        $statement = $this->connection->prepare($sqlQuery);
        $statement->bindValue(1, $birthDate->format('Y-m-d'));
        $statement->execute();

        return $this->hydrateStudents($statement);
    }

    public function hydrateStudents(\PDOStatement $statement): array
    {
        $studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];

        foreach ($studentDataList as $studentData) {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date'])
            );
        }
        return $studentList;
    }

    public function save(Student $student): bool
    {
        if ($student->id() === null) {
            return $this->insert($student);
        }
        return $this->update($student);
    }

    private function insert(Student $student):bool
    {
        $insertQuery = 'INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);';
        $statement = $this->connection->prepare($insertQuery);

        $success = $statement->execute([
           ':name' => $student->name(),
            ':birth_date' => $student->birth_date->format('Y-m-d'),
        ]);

        if($success){
            $student->defineId($this->connection->lastInsertId());
        }

        return $success;
    }

    public function update(Student $student): bool
    {
        $updateQuery = 'UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id;';
        $statement = $this->connection->prepare($updateQuery);
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $statement->execute();
    }

    public function remove(Student $student): bool
    {
        $statement = $this->connection->prepare('DELETE FROM students WHERE id = ?;');
        $statement->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $statement->execute();
    }
}