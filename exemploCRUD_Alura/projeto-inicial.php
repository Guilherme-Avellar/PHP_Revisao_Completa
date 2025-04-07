<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Alan Turing',
    new \DateTimeImmutable('1912-06-23')
);

echo $student->age();
