<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
  public function index(Request $request)
  {
    // get Students
    $keyword = $request->get('search');
    $itemPage = 10;

    if (!empty($keyword)) {
      $students = Student::where('name', 'LIKE', "%$keyword%")
        ->orWhere('email', 'LIKE', "%$keyword%")
        ->latest()->paginate($itemPage);
    } else {
      $students = Student::latest()->paginate($itemPage);
    }
    // render view with posts
    return view('students.index', compact('students'));
  }

  // Render View Insert Data Student
  public function create()
  {
    return view('students.create');
  }

  // Insert Data Student
  public function store(Request $request)
  {
    // validate form
    $request->validate([
      'number' => 'required|min:1',
      'name' => 'required|min:4',
      'email' => 'required|min:5',
      'phone' => 'required|min:10',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
    ]);

    // upload image
    $image = $request->file('image');
    $image->storeAs('public/students', $image->hashName());

    // create post
    Student::create([
      'number' => $request->number,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'image' => $image->hashName()
    ]);

    // redirect to index
    return redirect()->route('students.index')->with(['flash_message' => 'Data Berhasil Disimpan']);
  }

  public function show($id)
  {
    $student = Student::findOrFail($id);

    return view('students.show', compact('student'));
  }
  // Render View Edit Student
  public function edit(Student $student)
  {
    return view('students.edit', compact('student'));
  }

  public function update(Request $request, Student $student)
  {
    // validate form
    $request->validate([
      'number' => 'required|min:1',
      'name' => 'required|min:4',
      'email' => 'required|min:5',
      'phone' => 'required|min:10',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
    ]);

    // check if image is uploaded
    if ($request->hasFile('image')) {

      // upload new image
      $image = $request->file('image');
      $image->storeAs('public/students', $image->hashName());

      // delete old image
      Storage::delete('public/students/' . $student->image);

      // update post with new image
      $student->update([
        'number' => $request->number,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'image' => $image->hashName()
      ]);
    } else {
      // update post without image
      $student->update([
        'number' => $request->number,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone
      ]);
    }
    // redirect to index
    return redirect()->route('students.index')->with(['flash_message' => 'Data Berhasil Diubah']);
  }

  // destroy $student
  public function destroy(Student $student)
  {
    // delete image
    Storage::delete('public/student/' . $student->image);

    // delete psot
    $student->delete();

    // redirect to index
    return redirect()->route('students.index')->with(['flash_message' => 'Data Berhasil Dihapus']);
  }
}
