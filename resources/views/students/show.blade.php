@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Student {{ $student->id }}</div>
        <div class="card-body">

          <a href="{{ url('/students') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/students/' . $student->id . 'edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

          <form method="POST" action="{{ url('students' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </form>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>ID</th>
                  <td>{{ $student->id }}</td>
                </tr>
                <tr>
                  <th> Name </th>
                  <td> {{ $student->name }} </td>
                </tr>
                <tr>
                  <th> Email </th>
                  <td> {{ $student->email }} </td>
                </tr>
                <tr>
                <tr>
                  <th> No Handpohne </th>
                  <td> {{ $student->phone }} </td>
                </tr>
                <tr>
                  <th> Image </th>
                  <td><img src="{{ Storage::url('public/students/').$student->image }}" alt=""></td>
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