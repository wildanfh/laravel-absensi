@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Presence {{ $presence->id }}</div>
        <div class="card-body">

          <a href="{{ url('/presences') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/presences/' . $presence->id . '/edit') }}" title="Edit Presence"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

          <form method="POST" action="{{ url('presences' . '/' . $presence->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Presence" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </form>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>ID</th>
                  <td>{{ $presence->id }}</td>
                </tr>
                <tr>
                  <th> Schedule Id </th>
                  <td> {{ $presence->schedule_id }} </td>
                </tr>
                <tr>
                  <th> Student Id </th>
                  <td> {{ $presence->student_id }} </td>
                </tr>
                <tr>
                  <th> Note </th>
                  <td> {{ $presence->note }} </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection