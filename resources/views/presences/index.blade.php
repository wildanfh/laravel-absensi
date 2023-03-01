@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Presences</div>
        <div class="card-body">
          <a href="{{ url('/presences/create') }}" class="btn btn-success btn-sm" title="Add New Presence">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>

          <form method="GET" action="{{ url('/presences') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                  <th>Schedule Id</th>
                  <th>Student Id</th>
                  <th>Note</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($presences as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->schedule_id }}</td>
                  <td>{{ $item->student_id }}</td>
                  <td>{{ $item->note }}</td>
                  <td>
                    <a href="{{ url('/presences/' . $item->id) }}" title="View Presence"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/presences/' . $item->id . '/edit') }}" title="Edit Presence"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/presences' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Presence" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $presences->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection