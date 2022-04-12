<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $Students = Students::all();
        return view('dashboard', compact( 'Students'));
    }
    public function create()
    {
        return view('add-student');
    }
    public function storeStudent(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:50',           
            'education_year'    => 'required|string|max:50',
            'address' => 'required|max:200',
            'mobile'   => 'required',
            'class'   => 'required',
            'email'   => 'required|email',
            'gender'     => 'required',
            'photo'   => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);
        $Students = new Students;
        $Students->name = $request->name;
        $Students->mobile = $request->mobile;
        $Students->class = $request->class;
        $Students->education_year = $request->education_year;
        $Students->email = $request->email;
        $Students->gender = $request->gender;
        $Students->address = $request->address;

        if ($request->file('photo')) {
            $photoname = $request->file('photo')->getClientOriginalName();
            $request->photo->storeAs('public/images/Students/', $photoname);
            $Students->photo = $photoname;
        }

       $Students->save();

    return redirect('/')->with('success', ' Student Add successfully.');
        
    }
    public function editStudent($id)
    {
        $Students = Students::find($id);
        return view('edit-student', compact( 'Students'));
    }
    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:50',           
            'education_year'    => 'required|string|max:50',
            'address' => 'required|max:200',
            'mobile'   => 'required',
            'class'   => 'required',
            'email'   => 'required|email',
            'gender'     => 'required',
            'photo'   => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);
        $Students = Students::find($id);
        $Students->name = $request->name;
        $Students->mobile = $request->mobile;
        $Students->class = $request->class;
        $Students->education_year = $request->education_year;
        $Students->email = $request->email;
        $Students->gender = $request->gender;
        $Students->address = $request->address;

        if ($request->file('photo')) {
            $path = storage_path() . '/app/public/images/Students/';
            $file_old = $path . $Students->photo;
            unlink($file_old);
            $photoname = $request->file('photo')->getClientOriginalName();
            $request->photo->storeAs('public/images/Students/', $photoname);
            $Students->photo = $photoname;
        }



         $Students->save();
        return redirect('/')->with('success', 'Student Update successfully.');
    }
    public function deleteStudent($id)
    {
        $Students = Students::find($id);
        $Students->delete();
        return redirect('/')->with('success', 'Student Delete successfully.');
    }
    public function search(Request $request)
    {     
        $search = $request->sname;
         $Students = DB::table('students')->where('name', 'LIKE', "%{$search}%")->orWhere('email', 'LIKE', "%{$search}%")->get();
        //dd($Students);
    //    $Students = Students::query()
    //         ->where('name', 'LIKE', "%{$search}%") 
    //         ->get();
        return view('searchShow', compact( 'Students'));
        
    }
}
