@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Create New Quiz</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Student</th>
                  <th>Absensi</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <form method="POST" action="{{ url('/quizzes/' . $quizzes->id . '/store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  @foreach($group->members as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      {{ $item->student->name }}
                      <input type="hidden" name="items[{{ $loop->iteration }}][student_id]" value="{{ $item->student_id }}">
                    </td>
                    <td>
                      <label class="radio-inline">
                        <input type="radio" name="items[{{ $loop->iteration }}][status]" value="Hadir" checked> Hadir
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="items[{{ $loop->iteration }}][status]" value="Sakit"> Sakit
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="items[{{ $loop->iteration }}][status]" value="Izin"> Izin
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="items[{{ $loop->iteration }}][status]" value="Alpha"> Alpha
                      </label>
                    </td>

                    <td>
                      <input type="text" class="form-control" name="items[{{ $loop->iteration }}][note]">
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection