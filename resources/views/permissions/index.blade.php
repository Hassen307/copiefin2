@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="text-center">
	            <h2>Create new Page/Privilege</h2>
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
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid black; margin: 32px;padding: 25px; border-radius: 7px;">
        {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
         {!! Form::text('permiss', null, array('placeholder' => 'New Privileges (Page)','class' => 'form-control')) !!}
         <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-success">Submit</button>
        </div>
         {!! Form::close() !!}
         <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            </div></div>
        
        @if ( !empty ( $permissi ) )
        <div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="text-center">
	            <h2>Page/Privilege</h2>
	        </div>
	       
	    </div>
	</div>
        
	 <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid black; margin: 32px;padding: 25px; border-radius: 7px;">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			
			<th width="280px"><b>Name</b></th>
			<th width="120px"><b>Action</b></th>
			
		</tr>
          @if ( !empty ( $permissi ) )      
	@foreach ($permissi as $key => $permission)
	<tr>
            
		
		<td><b>{{ $permission }}</b></td>
                <td>
			
			
			<a class="btn btn-primary" href="{{ route('permissions.edit',$permission) }}">Edit</a>
			
			
			{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	
		</td>
		
		
	</tr>
	@endforeach
        @endif
	</table>
	<div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            </div></div>
        @endif
        </br></br></br></br></br></br></br></br></br></br></br></br>
@endsection