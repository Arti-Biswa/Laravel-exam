<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
    
        if ($query) {
            $students = Student::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $students = Student::all();
        }
        return view('home.view', ['students' => $students]);
    }
    
   public function add()
    {
        return view('home.add'); 
    }
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->phone_no = $request->phone_no;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagename); 
            $student->img = $imagename;
        }
    
        $student->save();
    
        return redirect()->route('home')->with('success', 'Student added successfully!');
    }
    
    public function destroy(string $id)
    {
      $student = Student::findOrFail($id);
        
      if ($student->img && file_exists(public_path('images/' . $student->img))) {
          unlink(public_path('images/' . $student->img));
      }

      $student->delete();

      return redirect()->route('home')->with('success', 'Student deleted succesfully');
    }
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('home.edit', compact('student'));
    }
    public function update(Request $request, string $id)
{
    $student = Student::findOrFail($id);

    if ($request->hasFile('img')) {
        if ($student->img && file_exists(public_path('images/' . $student->img))) {
            unlink(public_path('images/' . $student->img)); 
        }
        $image = $request->file('img');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imagename);
        $student->img = $imagename; 
    }

    $student->name = $request->name;
    $student->email = $request->email;
    $student->address = $request->address;
    $student->phone_no = $request->phone_no;

    $student->save();

    return redirect()->route('home')->with('success', 'Student updated successfully');
}

}
