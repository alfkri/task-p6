<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;



class StudentController extends Controller
{
    # menampilkan data
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
    
    # input data 
    function store(Request $request)
    {
       $student = Student::create([
           'nama' => $request->nama,
           'nim' => $request->nim,
           'email' => $request->email,
           'jurusan' => $request->jurusan,
       ]);

       $data = [
           'message'=>'Student is Created',
           'data'  => $student
       ];

       return response()->json($data,201);
    }
    # menampilkan detail data
    function show($id)
    {
        $student = Student::find($id);
        if ($student){
            $data = [
                'message' => "Get Detail Student",
                'data' => $student
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'message' => "Data not found"
            ];
            return response()->json($data,404);
        }
    }
    # meng update data
    function update(Request $request, $id)
    {
        $student = Student::find($id);
        if ($student){
            $student->update($request->all());
            // 'nama' => $request->nama ?? $student->nama,
            // 'nim' => $request->nim ?? $student->nim,
            // 'email' => $request->email ?? $student->email,
            // 'jurusan' => $request->jurusan ?? $student->jurusan,
            // ]);
            $data = [
                'message' => "Student is Updated",
                'data' => $student
            ];
            return response()->json($data,200);            
        } else{
            $data = [
                'message' => "Data not Found"
            ];
            return response()->json($data,404);
        }
    }
    # menghapus data
    function destroy($id)
    {
        $student = Student::find($id);
        if($student){
            $student->delete();
            $data = [
                'message' => 'Student is delete'
            ];
            return response()->json($data,200);
        } else{
            $data = [
                'message' => 'Data not found'
            ];
            return response()->json($data,200);
        }
    }
}
