<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Group;
use App\Models\Presence;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
{

  public function quizzes($id)
  {
    $group = Group::findOrFail($id);
    return view('groups.quizzes', compact('group'));
  }

  public function quizzes_store(Request $request)
  {

  }

  public function attendances($id)
  {
    $group = Group::findOrFail($id);
    return view('groups.attendances', compact('group'));
  }

  public function attendances_store(Request $request)
  {
    $start_at = Carbon::now();
    $end_at = $start_at->add(3, 'hour');
    $request->request->add([
      'user_id' => Auth::id(),
      'start_at' => $start_at,
      'end_at' => $end_at,
    ]);
    $requestData = $request->all();

    $schedule = Schedule::create($requestData);

    foreach ($requestData['items'] as $key => $item) {
      $presence = new Presence();
      $presence->schedule_id = $schedule->id;
      $presence->student_id = $item['student_id'];
      $presence->status = $item['status'];
      $presence->note = $item['note'];
      $presence->start_at = $start_at;
      $presence->end_at = $end_at;
      $presence->save();
    }

    return redirect()->route('schedules.show', $schedule->id)->with('flash_message', 'Data absensi berhasil disimpan');
  }

  public function index(Request $request)
  {
    $keyword = $request->get('search');
    $itemPage = 10;

    if (!empty($keyword)) {
      $groups = Group::where('user_id', 'LIKE', "%$keyword%")->orWhere('name', 'LIKE', "%$keyword%")->latest()->paginate($itemPage);
    } else {
      $groups = Group::latest()->paginate($itemPage);
    }

    return view('groups.index', compact('groups'));
  }

  public function create()
  {
    return view('groups.create');
  }

  public function store(Request $request)
  {
    $request->request->add(['user_id' => Auth::id()]);
    $requestData = $request->all();

    Group::create($requestData);

    return redirect('groups')->with('flash_message', 'Grup Berhasil Ditambahkan');
  }

  public function show($id)
  {
    $group = Group::findOrFail($id);

    return view('groups.show', compact('group'));
  }

  public function edit($id)
  {
    $group = Group::findOrFail($id);
    return view('groups.edit', compact('group'));
  }

  // update
  public function update(Request $request, $id)
  {
    $requestData = $request->all();

    $group = Group::findOrFail($id);
    $group->update($requestData);
    return redirect('groups')->with('flash_message', 'Group Berhasil Diubah');
  }

  public function destroy($id)
  {
    Group::destroy($id);

    return redirect('groups')->with('flash_message', 'Group Berhasil dihapus');
  }
}
