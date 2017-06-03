@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="text-center">
	            <h2>Privileges Management</h2>
                    
	        </div>
	        
	    </div>
        </div>
        @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
        <br><br>
         <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid white; margin: 32px;padding: 25px; border-radius: 7px;">
        {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
         {!! Form::text('permiss', null, array('placeholder' => 'New Privileges (Page)','class' => 'form-control')) !!}
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-success">Submit</button>
        </div>
         {!! Form::close() !!}
         <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            </div></div>
        
	 <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid white; margin: 32px;padding: 25px; border-radius: 7px;">
	<table class="table table-bordered">
		<tr>
			
			<th><b>Name</b></th>
			<th width="280px"><b>Action</b></th>
			
		</tr>
          @if ( !empty ( $permissi ) )      
	@foreach ($permissi as $key => $permission)
	<tr>
            
		
		<td><b>{{ $permission }}</b></td>
                <td>
			
			
			
			
			
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
        </br></br></br></br></br></br></br></br></br></br></br></br>
@endsection