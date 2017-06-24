@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	            @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



 second -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	            @endif


@if(session()->has('errors'))
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Following errors occurred:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





{!! Form::open(['url' => url('register'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

        

        <h2 class="form-signin-heading">Please register</h2>

     @if(session()->has('errors'))
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Following errors occurred:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif   
        
        
        
        
        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email'
        ]) !!}

        <label for="inputFirstName" class="sr-only">First name</label>
        {!! Form::text('name', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Full name',
            'required',
            'id'                            => 'inputFirstName',
            'data-parsley-required-message' => 'Name is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '2',
            'data-parsley-maxlength'        => '32'
        ]) !!}

    


        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password',
            'required',
            'id'                            => 'inputPassword',
            'data-parsley-required-message' => 'Password is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '6',
            'data-parsley-maxlength'        => '20'
        ]) !!}


        <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
        {!! Form::password('password_confirmation', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password confirmation',
            'required',
            'id'                            => 'inputPasswordConfirm',
            'data-parsley-required-message' => 'Password confirmation is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-equalto'          => '#inputPassword',
            'data-parsley-equalto-message'  => 'Not same as Password',
        ]) !!}

        <button class="btn btn-lg btn-primary btn-block register-btn" type="submit">Register</button>

      

        {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</div>













@endsection