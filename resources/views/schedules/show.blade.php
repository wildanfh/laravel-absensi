@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Schedule {{ $schedule->id }}</div>
        <div class="card-body">

          <a href="{{ url('/schedules') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/schedules/' . $schedule->id . '/edit') }}" title="Edit Schedule"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

          <form method="POST" action="{{ url('schedules' . '/' . $schedule->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Schedule" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </form>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>ID</th>
                  <td>{{ $schedule->id }}</td>
                </tr>
                <tr>
                  <th> Dosen </th>
                  <td> {{ $schedule->user->name }} </td>
                </tr>
                <tr>
                  <th> Group </th>
                  <td> {{ $schedule->group->name }} </td>
                </tr>
                <tr>
                  <th> Note </th>
                  <td> {{ $schedule->note }} </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Presences</div>
        <div class="card-body">
          <a href="{{ route('schedules.presences.create', $schedule) }}" class="btn btn-success btn-sm" title="Add New Presence">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Student</th>
                  <th>Status</th>
                  <th>Note</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($schedule->presences as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>

                  <td>{{ $item->student->name }}</td>
                  <td>{{ $item->status }}</td>
                  <td>{{ $item->note }}</td>
                  <td>
                    <a href="{{ url('/presences/' . $item->id) }}" title="View Presence"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <!-- <a href="{{ url('/presences/' . $item->student_id . '/edit') }}" title="Edit Presence"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/presences' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Presence" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form> -->
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