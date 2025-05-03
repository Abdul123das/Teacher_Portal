<?php

// Check if the function is not already defined
if (!function_exists('teacherInfo')) {
    /**
     * Get teacher info based on the teacher's ID and the field name.
     *
     * @param int $teacher_id
     * @param string $field
     * @return mixed
     */
    function teacherInfo($teacher_id, $field)
    {
        $teacher = \DB::table('teachers')->where('id', $teacher_id)->first();
        return $teacher ? $teacher->{$field} : null;
    }
}
