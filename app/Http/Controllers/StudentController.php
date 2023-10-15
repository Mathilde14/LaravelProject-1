<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index(){
        return view('students.list');
    }
    public function create(){
        return view('students.create');
    }

    public function edit(Student $students){
        return view('students.edit', compact('students'));
    }
    public function show(Student $students){
        return view('students.show', compact('students'));
    }
}
