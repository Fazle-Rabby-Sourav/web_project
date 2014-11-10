@extends('layouts.default')

@section('content')
	<div class="row">
    	<div class="col-md-5 col-md-offset-4">
    		<div class="page-header">
			    <h3>Upload</h3>
			</div>

	  		@include('includes/alerts')
	    	{{ Form::open(['route' => 'upload', 'files' => true]) }}
	    		<div class="form-group">
	    	  		{{ Form::text('caption',null, ["class"=>"form-control input-lg", "placeholder"=>"Caption"]) }}
	    		</div>
	    	  	<div class="form-group">
	    	  		{{ Form::textarea('details', null, ["class"=>"form-control input-lg", "placeholder"=>"details"]) }}
	    		</div>
	    		<div class="form-group">
	    			{{ Form::file('picture', ["class"=>"form-control input-lg"]) }}
	    		</div>

	    		{{ Form::submit('Upload', ['class'=>'btn btn-lg btn-success btn-block']) }}

	    	{{ Form::close() }}
		</div>
	</div>
@stop