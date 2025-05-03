<?php

namespace App\Repositories;

use App\Repositories\CommonRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher; // Use a specific model

class CommonRepository implements CommonRepositoryInterface
{
    protected $model;

    public function __construct(Teacher $model) // Inject a specific model
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->findById($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function teacher_count()
    {
        return DB::table('teachers')->where('status', 1)->count(); // Return count
    }


    public function student_count()
    {
        return DB::table('students')->where('status', 1)->count(); // Return count
    }
}
