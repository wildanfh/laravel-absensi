@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Group {{ $group->id }}</div>
        <div class="card-body">
          <a href="{{ url('/groups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>Id</th>
                  <td>{{ $group->id }}</td>
                </tr>
                <tr>
                  <th>Dosen Id</th>
                  <td>{{ $group->user->name }}</td>
                </tr>
                <tr>
                  <th> Name </th>
                  <td> {{ $group->name }} </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Quizzes</div>
        <div class="card-body">
          <a href="{{ url('/quizzes/create') }}" class="btn btn-success btn-sm" title="Add New Group">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>

          <form method="GET" action="{{ url('/groups') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group mt-1">
              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>

          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Subject</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (is_array($group->quizzes))
                @foreach($group->quizzes as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->subject }}</td>
                  <td>
                    <a href="{{ url('/groups/' . $item->id) }}" title="View Group"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/groups/' . $item->id . '/edit') }}" title="Edit Group"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/groups' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Group" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection