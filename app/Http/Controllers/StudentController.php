<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentController extends Controller
{

    public function index(){
    	$data = student::all();
    	return view('index',compact('data'));
    }

    public function store(Request $request){

    	$validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:students',
        'phone' => 'required',
       
    ]);
       
       $students = new student;
       $students->name= $request->name;
       $students->email= $request->email;
       $students->phone= $request->phone;
       
       if($request->hasFile('image')){
       //get image file.
	    $file = $request->image;
	    //get just extension.
	    $ext = $file->getClientOriginalExtension();
	    //make a unique name
	    $filename = 'upload/images/'.uniqid().'.'.$ext;
	    $file->move('upload/images/', $filename);
	    $students->image=$filename;
	    }

	    $students->save();

	     return redirect('/student')->with('status', 'Student added Successfully!');

}
  
public function edit($id)
{

	$result = student::find($id);
	return view('editstudent', compact('result'));
	
}
public function update(Request $request, $id)
{
		
       $result = student::find($id);
       $result->name= $request->name;
       $result->email= $request->email;
       $result->phone= $request->phone;
       
       if($request->hasFile('image')){
          unlink($request->old_photo);
       //get image file.
	    $file = $request->image;
	    //get just extension.
	    $ext = $file->getClientOriginalExtension();
	    //make a unique name
	    $filename = 'upload/images/'.uniqid().'.'.$ext;
	    $file->move('upload/images/', $filename);
	   
	    $result->image=$filename;
	    
	    }
	    

	   $result->save();

	    return redirect('/student')->with('status', 'Student updated Successfully!');
	
}

public function destroy($id)
{

	$result = student::find($id);
	if($result->image){
	  unlink($result->image);
  }
	$result->delete();

	return redirect()->route('student')->with('status', 'Student Deleted Successfully!');
	
}

}
