<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(2);
        return view('students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $validate = $request->validated();
        Student::create($validate);
        return redirect('students')->with('success', 'Berhasil Menambahkan Data Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('students.edit', [
            'student' => Student::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        
        $rules = [
            'name' => 'required|max:255|min:2',
            'email' => 'required|email:dns',
            'gender' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|numeric'
        ];

        if ($request->has('email') && $request->email !== $request->email)   {
            $rules['email'] .= '|unique:students,email';
        }
        $validated = $request->validate($rules);
        $student->update($validated);
        return redirect('students')->with('success', 'Berhasil Mengedit Data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('students')->with('success', 'Data berhasil di hapus');
    }
}
