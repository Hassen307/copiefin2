@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
       
        @if ($message = Session::get('successdel'))
		<div class="alert alert-danger">
			<p>{{ $message }}</p>
		</div>
	@endif
         <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid white; margin: 32px;padding: 25px; border-radius: 7px;">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			
			<th width="200px"><b>Name</b></th>
			<th width="280px"><b>Email</b></th>
			<th width="80px"><b>Roles</b></th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
            
		
		<td><b>{{ $user->name }}</b></td>
		<td><b>{{ $user->email }}</b></td>
		<td>
                    
                    
		
				
					<label>{{$user->roles->name}}</label>
				
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
                <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            </div></div>
	{!! $data->render() !!}
        </br></br></br></br></br></br></br></br></br></br></br></br>
@endsection