@extends('layouts.app')
 
@section('content')
@if ( !empty ( $permissi ) )
<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div>
                         <h2>View's Name</h2>    
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
        @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
        
        {!! Form::open(array('route' => 'viewcontent','method'=>'POST')) !!}
        
        <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            
              <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                    <strong>View:</strong>
                   <select name="permission_name">
                          @foreach($permissi as $key => $value)
                          <option value="{!! $value !!}">{!! $value !!}</option>
                         @endforeach
                    </select>
                </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm"></div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid black; margin: 32px;padding: 25px; border-radius: 7px;">
                
                <div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div>
                         <h2>View's Content</h2>    
	        </div>
	      
	    </div>
	</div>
	<div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>viewcontent:</strong>
                {!! Form::textarea('viewcontent', null, array('placeholder' => 'viewcontent','class' => 'form-control','style'=>'height:400px')) !!}
            </div>
        </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-success">Submit</button>
        </div>
           
	</div>
                </div>
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
        </div>
	{!! Form::close() !!}

@endif

@if ( empty ( $permissi ) )
<center><h2>There is no page yet</h2></center>
<center>     <img src="/img/empty.png"></center>
@endif

@endsection