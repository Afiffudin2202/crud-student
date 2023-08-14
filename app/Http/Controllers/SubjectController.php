<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::paginate(2);
        return view('subject.index', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_subject' => 'required|unique:subjects,id_subject',
            'name' => 'required|max:255',
            'department' => 'required'
        ];

        $validated = $request->validate($rules);
        Subject::create($validated);
        return redirect('subjects')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        return view('subject.edit', [
            'subject' => Subject::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $rules = [
            'id_subject' => 'required',
            'name' => 'required|max:255',
            'department' => 'required'
        ];

        if ($request->has('id_subject') && $request->id_subject !== $subject->id_subject) {
            $rules['id_subject'] .= '|unique:stundets,id_subject';
        }

        $validate = $request->validate($rules);
        $subject->update($validate);

        return redirect('subjects')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect('subjects')->with('success', 'Data berhasil di hapus');
    }
}
