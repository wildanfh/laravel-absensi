@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Groups</div>
        <div class="card-body">
          <a href="{{ url('/groups/create') }}" class="btn btn-success btn-sm" title="Add New Group">
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
                  <th>#</th>
                  <th>Dosen</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($groups as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->user->name }}</td>
                  <td>{{ $item->name }}</td>
                  <td>
                    <a href="{{ url('/groups/' . $item->id) . '/attendances'}}" title="Attendances"><button class="btn btn-success btn-sm"><i class="fa fa-address-car" aria-hidden="true"></i>Absensi</button></a>
                    <a href="{{ url('/groups/' . $item->id) }}" title="View Group"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/groups/' . $item->id . '/edit') }}" title="Edit Group"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    
                    <form method="POST" action="{{ url('/groups' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Group" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <a href="{{ url('/groups/' . $item->id . '/quizzes') }}" title="Edit Group"><button class="btn btn-sm" style="background: orange;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Quiz</button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $groups->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection