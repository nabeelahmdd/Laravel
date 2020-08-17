@extends('addusers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addusers.create') }}"> Create new blogs</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ( $addusers as $adduser ) 
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $adduser->name }}</td>
            <td>{{ $adduser->email}}</td>
            <td>
                <form action="{{ route('addusers.destroy',$adduser->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('addusers.show',$adduser->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('addusers.edit',$adduser->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $addusers->links() !!}
      
@endsection