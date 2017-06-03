@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="text-center">
	            <h2>User Info</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
<div class="row">
            <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"  style="border: 1px solid white; margin: 32px;padding: 25px; border-radius: 7px;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
              
						<span class = "label label-primary">{{$user->roles->name}}</span>
					
            </div>
        </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if ( !empty ( $user_perm ) )
               @foreach ($user_perm as $key => $value)
						<span class = "label label-success">{{$value}}</span>
		 @endforeach
                 @endif
            </div>
        </div>
	</div>
 </div>
            <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
        </div>
@endsection