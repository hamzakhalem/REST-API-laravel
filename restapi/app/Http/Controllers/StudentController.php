<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;
class StudentController extends Controller
{
    //
    public function index(){
        $students = [
              'status' => 200,
              'students'  => Student::all()
        ];
        return response()->json($students, 200);
    }
    
    public function upload(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required', 
                'email' => 'required|email', 
            ]
        );
        if($validator->fails()){
            $data = [
                'status' => 422,
                'data'  => $validator->messages()
             ];
            return response()->json($data, 422);
        }
        else{
            $student = new Student();

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();
            $student = [
                  'status' => 200,
                  'students'  => 'studnet added'
            ];

            return response()->json($student, 200);
        }
    }
    public function edit(Request $request, $id){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required', 
                'email' => 'required|email', 
            ]
        );
        if($validator->fails()){
            $data = [
                'status' => 422,
                'data'  => $validator->messages()
             ];
            return response()->json($data, 422);
        }
        else{
            $student = Student::find($id);

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();
            $student = [
                  'status' => 200,
                  'students'  => 'studnet updated'
            ];

            return response()->json($student, 200);
        }
    }

    public function delete($id){
        $student = Student::find($id);
        $student->delete();
        $student = [
                'status' => 200,
                'students'  => 'studnet dekleted'
        ];

        return response()->json($student, 200);
        }
}
