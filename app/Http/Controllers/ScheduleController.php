<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Models\Schedule;
use App\Models\Group;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
  public function index(Request $request)
  {
    $keyword = $request->get('search');
    $itemPage = 10;

    if (!empty($keyword)) {
      $schedules = Schedule::where('user_id', 'LIKE', "%$keyword%")
        ->orWhere('group_id', 'LIKE', "%$keyword%")
        ->orWhere('note', 'LIKE', "%$keyword%")
        ->orWhere('start_at', 'LIKE', "%$keyword%")
        ->orWhere('end_at', 'LIKE', "%$keyword%")
        ->latest()->paginate($itemPage);
    } else {
      $schedules = Schedule::latest()->paginate($itemPage);
    }
    
    return view('schedules.index', compact('schedules'));
  }

  public function create()
  {
    $groups = Group::where('user_id', Auth::id())->get();

    return view('schedules.create', compact('groups'));
  }

  public function store(Request $request)
  {
    $request->request->add([ 'user_id' => Auth::id()]);

    $requestData = $request->all();
    Schedule::create($requestData);
    
    return redirect('schedules')->with('flash_message', 'Schedule Berhasil Ditambahkan');
  }

  public function show($id)
  {
    $schedule = Schedule::findOrFail($id);



    return view('schedules.show', compact('schedule'));
  }

  public function edit($id)
  {
    $schedule = Schedule::findOrFail($id);

    return view('schedules.edit', compact('schedule'));
  }

  public function update(Request $request, $id)
  {
    $requestData = $request->all();

    $schedule = Schedule::findOrFail($id);
    $schedule->update($requestData);

    return redirect('schedules')->with('flash_message', 'Schedule Diperbarui');
  }

  public function destroy($id)
  {
    Schedule::destroy($id);

    return redirect('schedules')->with('flash_message', 'Schedule Berhasil Dihapus');
  }
}
