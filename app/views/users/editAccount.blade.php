@extends('layouts.default')

@section('content')
    <div class="row">
    	<div class="col-md-5 col-md-offset-4">
    		<div class="page-header">
			    <h3>Edit Account</h3>
			</div>

	  		@include('includes/alerts')
	    	{{ Form::open(['route' => ['account.edit', $user->id], 'method' => 'put']) }}
	    		<div class="form-group">
	    	  		{{ Form::text('name', $user->name,["class"=>"form-control input-lg", "placeholder"=>"Name"]) }}
	    		</div>
	    	  	<div class="form-group">
	    	  		{{ Form::text('email', $user->email,["class"=>"form-control input-lg", "placeholder"=>"yourmail@example.com"]) }}
	    		</div>
	    		<div class="form-group">
	    			{{ Form::password('password', ["class"=>"form-control input-lg", "placeholder"=>"Password"]) }}
	    			<p class="help-block">Leaving blank will not change the password.</p>
	    		</div>
	    		{{ Form::submit('Update Account', ['class'=>'btn btn-lg btn-success btn-block']) }}

	    	{{ Form::close() }}
		</div>
	</div>
@stop