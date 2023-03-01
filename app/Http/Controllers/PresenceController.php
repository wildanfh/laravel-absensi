<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Presence;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Preset;

class PresenceController extends Controller
{
  public function index(Schedule $schedule, Request $request)
  {
    $keyword = $request->get('search');
    $itemPage = 10;

    if (!empty($keyword)) {
      $presences = Presence::where('schedule_id', 'LIKE', "%$keyword%")
        ->orWhere('student_id', 'LIKE', "%$keyword%")
        ->orWhere('note', 'LIKE', "%$keyword%")
        ->orWhere('start_at', 'LIKE', "%$keyword%")
        ->orWhere('end_at', 'LIKE', "%$keyword%")
        ->latest()->paginate($itemPage);
    } else {
      $presences = Presence::latest()->paginate($itemPage);
    }

    return view('presences.index', compact('presences'));
  }

  public function create(Schedule $schedule)
  {
    $students = Student::all();
    return view('presences.create', compact('students', 'schedule'));
  }

  public function store(Schedule $schedule, Request $request)
  {
    $request->request->add(['schedule_id' => $schedule->id]);
    $requestData = $request->all();

    Presence::create($requestData);

    return redirect('schedules.show', $schedule)->with('flash_message', 'Presence Berhasil Ditambahkan');
  }

  public function show(Schedule $schedule, $id)
  {
    $presence = Presence::findOrFail($id);

    return view('presences.show', compact('presence'));
  }

  public function edit(Schedule $schedule, $id)
  {
    $presence = Presence::findOrFail($id);

    return view('presences.edit', compact('presence'));
  }

  public function update(Schedule $schedule, Request $request, $id)
  {
    $requestData = $request->all();

    $presence = Presence::findOrFail($id);
    $presence->update($requestData);

    return redirect('presences')->with('flash_message', 'Presence Berhasil Diubah');
  }

  public function destroy(Schedule $schedule, $id)
  {
    Presence::destroy($id);

    return redirect('presences')->with('flash_message', 'Presence Berhasil Dihapus');
  }
}
