<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;



class StudentController extends Controller
{
    function index()
    {
        // ambil data dari database 
       $students = Student::all();
       $data = [
           'message' => 'Get all students',
           'data' => $students
       ];
       return response()->json($data, 200);
    }
}
