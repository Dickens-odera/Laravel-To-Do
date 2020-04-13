@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> Add New</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h6 class="text-center text-uppercase">My Tasks</h6>
                       <div class="table-responsive">
                           <table class="table table-bordered">
                               <thead style="color:#fff; background:#000">
                                    <tr>
                                        <th>#</th>
                                        <th>Task</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>    
                            </thead>
                            @if(isset($lists))
                                @foreach ($lists as $key => $value)
                                    <tbody>
                                        <tr>
                                            <td>{{ $value->id}}</td>
                                            <td>{{ $value->task }}</td>
                                            <td>{{ $value->description }}</td>
                                            @if($value->inComplete === 0)
                                            <td>complete</td>
                                            @else
                                            <td>pending</td>
                                            @endif
                                            {{-- @can('view', Lists::class) --}}
                                            <td class="btn-group btn-group-sm" style="width:100%">
                                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</a>
                                                {{-- <a href="" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a> --}}
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Edit</button>
                                                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-wrench"></i> Mark as complete</a>
                                            </td>
                                            {{-- @endcan --}}
                                        </tr>
                                    </tbody>
                                @endforeach
                            @endif
                            {{ $lists->links()}}
                           </table>
                       </div>
                </div>
            </div>
        </div>
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('lists.submit') }}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">List Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="task">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="message-text" name="description"></textarea>
          </div>
          <div class="form-group"></div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
@endsection
