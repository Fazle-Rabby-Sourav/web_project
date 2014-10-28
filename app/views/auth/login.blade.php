@extends('layouts.default')

@section('content')
    <div class="row">
    	<div class="col-md-4 col-md-offset-4 padding_top">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login</h3>
			 	</div>
			  	<div class="panel-body">
			  		@include('includes/alerts')
			    	<!-- <form accept-charset="UTF-8" role="form"> -->
			    	{{ Form::open(['route' => 'login']) }}
			    	  	<div class="form-group">
			    	  		{{ Form::text('email', null,["class"=>"form-control input-lg", "placeholder"=>"yourmail@example.com"]) }}

			    		    <!-- <input class="form-control" placeholder="yourmail@example.com" name="email" type="text"> -->
			    		</div>
			    		<div class="form-group">
			    			{{ Form::password('password', ["class"=>"form-control input-lg"]) }}
			    			<!-- <input class="form-control" placeholder="Password" name="password" type="password" value=""> -->
			    		</div>
			    		{{ Form::submit('Login', ['class'=>'btn btn-lg btn-success btn-block']) }}

			    		<!-- <input class="btn btn-lg btn-success btn-block" type="submit" value="Login"> -->
			    	{{ Form::close() }}
			      	<!-- </form> -->
			    </div>
			</div>
		</div>
	</div>
@stop