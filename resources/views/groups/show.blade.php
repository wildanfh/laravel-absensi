@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Group {{ $group->id }}</div>
        <div class="card-body">

          <a href="{{ url('/groups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/groups/' . $group->id . '/edit') }}" title="Edit Group"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

          <form method="POST" action="{{ url('groups' . '/' . $group->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Group" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </form>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>ID</th>
                  <td>{{ $group->id }}</td>
                </tr>
                <tr>
                  <th> User Id </th>
                  <td> {{ $group->user_id }} </td>
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


<div class="container mt-3">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Members</div>
        <div class="card-body">
          <a href="{{ route('groups.members.create', $group) }}" class="btn btn-success btn-sm" title="Add New Member">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>

          <form method="GET" action="{{ url('/members') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group mt-2">
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
                  <th>#</th>
                  <th>Student</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($group->members as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->student->name }}</td>
                  <td>
                    <a href="{{ url('/members/' . $item->id) }}" title="View Member"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/members/' . $item->id . '/edit') }}" title="Edit Member"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/members' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Member" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
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