<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository extends CommonRepository
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }
}
