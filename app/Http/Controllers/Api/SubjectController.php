<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::latest()->paginate(5);
        if (!$subject) {
            return response()->json([
                'status' => 'error',
                'message' => 'Subject not found',
                
            ], 404);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'Subject found',
            'Subject' => $subject
        ], 200,);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_subject' => 'required|unique:subjects,id_subject',
            'name' => 'required|min:3|max:255',
            'department' => 'required'
        ];

        $validated = Validator::make($request->all(),$rules);
        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data has invalid',
                'errors' => $validated->errors()
            ], 422);
        }

        $subject = Subject::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Succesfully create new subject',
            'subject' => $subject
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = SUbject::find($id);
        if (!$subject) {
            return response()->json([
                'status' => 'error',
                'message' => 'subject not found',
            ], 404);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'subject found',
            'subject' => $subject
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }
        
        $rules = [
            'id_subject' => 'required',
            'name' => 'required|min:3|max:255',
            'department' => 'required'
        ];

        if ($request->has('id_subject') && $request->id_subject !== $subject->id_subject ) {
            $rules['id_subject'] .= '|unique:subjects,id_subject';
        }

        $validated = Validator::make($request->all(), $rules);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data is invalid',
                'errors' => $validated->errors()
            ], 422);
        }

        $subject->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully update subject',
            'subject' => $subject
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $subject->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'successfully delete subject',
            'subject' => $subject
        ], 200);
    }
}
