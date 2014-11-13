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

	    		<div>
	    				<div class="radio">
							  <label>
							    	<input type="radio" name="optionsRadios" id="optionsRadios1" value=1 checked>
							   		Abstract
							  </label>
						</div>


			    		<div class="radio">
							  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios2" value=2>
								    Potrait
							  </label>
						</div>

						<div class="radio">
							  <label>
							    	<input type="radio" name="optionsRadios" id="optionsRadios1" value=3 >
							   		Landscape
							  </label>
						</div>


			    		<div class="radio">
							  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios2" value=4>
								    Macro
							  </label>
						</div>

						<div class="radio">
							  <label>
							    	<input type="radio" name="optionsRadios" id="optionsRadios1" value=5 >
							   		Sport
							  </label>
						</div>
	    		</div>


	    		<div class="form-group">
	    			{{ Form::file('picture', ["class"=>"form-control input-lg"]) }}
	    		</div>

	    		{{ Form::submit('Upload', ['class'=>'btn btn-lg btn-success btn-block']) }}

	    	{{ Form::close() }}
		</div>
	</div>
@stop