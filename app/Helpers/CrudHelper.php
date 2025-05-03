<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Exception;

class CrudHelper
{
//     /**
//      * Create a new record in the database.
//      *
//      * @param Model $model
//      * @param array $data
//      * @return mixed
//      */
//     public static function create(Model $model, array $data)
//     {
//         return $model::create($data);
//     }

//     /**
//      * Read/Get a record by ID.
//      *
//      * @param Model $model
//      * @param int $id
//      * @return mixed
//      */
//     public static function read(Model $model, int $id)
//     {
//         return $model::find($id);
//     }

//     /**
//      * Update a record in the database.
//      *
//      * @param Model $model
//      * @param int $id
//      * @param array $data
//      * @return mixed
//      */
//     public static function update(Model $model, int $id, array $data)
//     {
//         $record = $model::find($id);
//         if ($record) {
//             $record->update($data);
//             return $record;
//         }
//         return null;
//     }

//     /**
//      * Delete a record from the database.
//      *
//      * @param Model $model
//      * @param int $id
//      * @return bool
//      */
//     public static function delete(Model $model, int $id)
//     {
//         $record = $model::find($id);
//         if ($record) {
//             return $record->delete();
//         }
//         return false;
//     }

//     /**
//      * Get all records from a model.
//      *
//      * @param Model $model
//      * @return mixed
//      */
//     public static function getAll(Model $model)
//     {
//         return $model::all();
//     }

//    /**
//      * Find teacher by ID.
//      *
//      * @param int $teacher_id
//      * @return mixed
//      */
//     public static function findTeacherById($teacher_id)
//     {
//         $teacher = DB::table('teachers')->where('id', $teacher_id)->first();
//         dd(teacher);
//     }
}
