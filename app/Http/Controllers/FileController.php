<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function importStudent(){
        return view('students.importStudent');
    }

    public function importStudentIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();

            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['firstName' => $value->firstname, 'middleName' => $value->middlename,
                        'lastName' => $value->lastname, 'email' => $value->email, 'contact' => $value->contact ,
                        'address' => $value->address];
                }
                if(!empty($arr)){
                    \DB::table('students')->insert($arr);
                    return redirect()->route('students.index');
                }
            }
        }
        return redirect()->route('import-student');
    }

    public function importMajor(){
        return view('majors.importMajor');
    }

    public function importMajorIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();

            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name];
                }
                if(!empty($arr)){
                    \DB::table('majors')->insert($arr);
                    return redirect()->route('majors.index');
                }
            }
        }
        return redirect()->route('import-major');
    }

    public function importGroup(){
        return view('groups.importGroup');
    }

    public function importGroupIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();

            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name];
                }
                if(!empty($arr)){
                    \DB::table('groups')->insert($arr);
                    return redirect()->route('groups.index');
                }
            }
        }
        return redirect()->route('import-group');
    }

    public function importModule(){
        return view('modules.importModule');
    }

    public function importModuleIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();

            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name];
                }
                if(!empty($arr)){
                    \DB::table('modules')->insert($arr);
                    //echo 'hello';
                    return redirect()->route('modules.index');
                }
            }
        }
        //echo 'not installed';
        return redirect()->route('import-module');
    }
}
