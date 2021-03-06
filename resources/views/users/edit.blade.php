@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="text-center">
	            <h2>Edit User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid black; margin: 32px;padding: 25px; border-radius: 7px;">
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
            <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <button type="submit" class="btn btn-success pull-right" style="width: 150px">Submit</button>
                </div>
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            </div>
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
        </div>
	{!! Form::close() !!}
@endsection