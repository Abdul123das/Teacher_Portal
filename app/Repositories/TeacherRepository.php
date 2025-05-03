<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Transformers\TeacherTransformer;

class TeacherRepository extends CommonRepository
{
    public function __construct(Teacher $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        $teachers = $this->model->all();
        return TeacherTransformer::collection($teachers);
    }

    public function findById($id)
    {
        $teacher = $this->model->findOrFail($id);
        return TeacherTransformer::transform($teacher);
    }

    public function create(array $data)
    {
        $teacher = $this->model->create($data);
        return TeacherTransformer::transform($teacher);
    }

    public function update($id, array $data)
    {
        $record = $this->findById($id);
        $record->update($data);
        return TeacherTransformer::transform($record);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
