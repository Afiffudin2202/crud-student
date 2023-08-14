<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->paginate(5);
        return response()->json([
            'status' => 'ok',
            'message' => 'data found',
            'students' => $students
        ], 200);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required|max:255|min:2',
            'email' => 'required|email:dns|unique:students,email',
            'gender' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|numeric'
        ];

        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data is invalid',
                'errors' => $validated->errors()
            ], 422);
        }

        $student = Student::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Succesfully create a new student',
            'student' => $student
        ], 200);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'student not found'
            ], 404);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'student found',
            'student' => $student
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        
        $rules = [
            'name' => 'required|max:255|min:2',
            'email' => 'required|email:dns',
            'gender' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|numeric'
        ];

        if ($request->has('email') && $request->email !== $student->email ) {
            $rules['email'] .= '|unique:students,email';
        }

        $validated = Validator::make($request->all(), $rules);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data is invalid',
                'errors' => $validated->errors()
            ], 422);
        }

        $student->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully update Student',
            'student' => $student
        ], 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'id not found'
            ], 404);
        }

        $student->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully Delete a Student',
            'Student' => $student
        ], 200);
    }
}
