<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    // ✅ type-hint StudentService so Laravel can auto-inject it
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getAllStudents();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $student = $this->studentService->createStudent($request->all());
        return response()->json($student, 201);
    }

    public function show(string $id)
    {
        $student = $this->studentService->getStudentById($id);
        if ($student) {
            return response()->json($student, 200);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }

    public function update(Request $request, string $id)
    {
        $student = $this->studentService->updateStudent($id, $request->all());
        if ($student) {
            return response()->json($student, 200);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }

    public function destroy(string $id)
    {
        $deleted = $this->studentService->deleteStudent($id);
        if ($deleted) {
            return response()->json(['message' => 'Student deleted'], 200);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }
}
