@extends('layouts.default')

@section('content')
	<div class="row">
    	<div class="col-md-5 col-md-offset-4">
    		<div class="page-header">
			    <h3>Categories</h3>
			    	<a href="{{ URL::route('categoryShow', 1) }}" class="btn btn-mid btn-success">Abstract</a>
			    	<a href="{{ URL::route('categoryShow', 2) }}" class="btn btn-mid btn-success">Potrait</a>
			    	<a href="{{ URL::route('categoryShow', 3) }}" class="btn btn-mid btn-success">Landscape</a>
			    	<a href="{{ URL::route('categoryShow', 4) }}" class="btn btn-mid btn-success">Macro</a>
			    	<a href="{{ URL::route('categoryShow', 5) }}" class="btn btn-mid btn-success">Sports</a>
			</div>
		</div>
	</div>

@stop


	    	
	    	
	    	
	    	