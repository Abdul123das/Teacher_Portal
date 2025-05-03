<?php

namespace App\Transformers;

class TeacherTransformer
{
    public static function transform($teacher)
    {
        return [
            'id' => isset($teacher->id) ? (int) $teacher->id : 0,
            'name' => isset($teacher->name) ? (string) $teacher->name : '',
            'email' => isset($teacher->email) ? (string) $teacher->email : '',
            'phone' => isset($teacher->phone) ? (string) $teacher->phone : '',
            'address' => isset($teacher->address) ? (string) $teacher->address : '',
            'date_of_birth' => isset($teacher->date_of_birth) ? (string) \Carbon\Carbon::parse($teacher->date_of_birth)->format('Y-m-d') : '',
            'gender' => isset($teacher->gender) ? (string) $teacher->gender : '',
            'profile_picture' => isset($teacher->profile_picture) ? (string) $teacher->profile_picture : '',
            'subject_name' => isset($teacher->subject_name) ? (string) $teacher->subject_name : '',
            'parent_name' => isset($teacher->parent_name) ? (string) $teacher->parent_name : '',
            'parent_contact' => isset($teacher->parent_contact) ? (string) $teacher->parent_contact : '',
            'detail' => isset($teacher->detail) ? (string) $teacher->detail : '',
            'status' => isset($teacher->status) ? (int) $teacher->status : 0,
            'created_at' => isset($teacher->created_at) && !empty($teacher->created_at) ? $teacher->created_at->format('Y-m-d H:i:s') : null,
        ];
    }

    public static function collection($teachers)
    {
        return $teachers->map(fn($teacher) => self::transform($teacher));
    }
}
