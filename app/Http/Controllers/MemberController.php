<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Group;
use App\Models\Member;
use App\Models\Student;
use Illuminate\Http\Request;

class MemberController extends Controller
{
  // Display the resource
  public function index(Group $group, Request $request)
  {
    $keyword = $request->get('search');
    $itemPage = 10;

    if(!empty($keyword)) {
      $members = Member::where('group_id', 'LIKE', '%k$keyword%')->orWhere('student_id', 'LIKE', '%$keyword%')->latest()->paginate($itemPage);
    } else {
      $members = Member::latest()->paginate($itemPage);
    }

    return view('members.index', compact('members'));
  }

  public function create(Group $group)
  {
    $students = Student::all();
    return view('members.create', compact('group', 'students'));
  }

  public function store(Group $group, Request $request)
  {
    $requestData = $request->all();

    Member::create($requestData);

    return redirect()->route('groups.show', $group)->with(['flash_message' => 'Data Berhasil Disimpan']);
  }

  public function show(Group $group, $id)
  {
    $member = Member::findOrFail($id);

    return view('members.show', compact('member'));
  }

  public function edit(Group $group, $id)
  {
    $member = Member::findOrFail($id);
    $student = Student::findOrFail($id);

    return view('members.edit', compact('member', 'student', 'group'));
  }

  public function update(Group $group, Request $request, $id)
  {
    $requestData = $request->all();

    $member = Member::findOrFail($id);
    $member->update($requestData);

    return redirect('members')->with('flash_message', 'Member Diperbarui');
  }

  public function destroy(Group $group, $id)
  {
    Member::destroy($id);

    return redirect('members')->with('flash_message', 'Member Dihapus');
  }
}