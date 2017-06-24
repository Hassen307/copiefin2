@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-right">
	        	
	            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
	           
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
        <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid white; margin: 32px;padding: 25px; border-radius: 7px;">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			
			<th width="190px"><b>Name</b></th>
			<th width="320px"><b>Description</b></th>
			<th width="280px"><b>Action</b></th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		
		<td><b>{{ $role->name }}</b></td>
		<td><b>{{ $role->description }}</b></td>
		<td>
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
			@if ($role->name!='admin')
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
			
			
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endif
		</td>
	</tr>
	@endforeach
	</table>
                <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            </div></div>
	{!! $roles->render() !!}
        </br></br></br></br></br></br></br></br></br></br></br></br>
@endsection