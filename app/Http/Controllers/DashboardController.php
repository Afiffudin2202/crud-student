<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    $student = Student::count();
    $subject = Subject::count();
    return view('/dashboard',[
        'student' => $student,
        'subject' => $subject
    ]);
    }
}