<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function getAllStudents()
    {
        return Student::all();
    }

    public function getStudentById($id)
    {
        return Student::find($id);
    }

    public function createStudent($data)
    {
        return Student::create($data);
    }

    public function updateStudent($id, $data)
    {
        $student = Student::find($id);
        if ($student) {
            $student->update($data);
            return $student;
        }
        return null;
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return true;
        }
        return false;
    }
}
