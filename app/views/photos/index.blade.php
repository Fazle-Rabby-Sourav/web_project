@extends('layouts.default')

@section('content')
			
		@for($i=0; $i<count($photos); $i++)

			@if($i == 0)
				<div class="row">
			@elseif($i%4 == 0)
				</div>
				<div class="row">
			@endif
				
			<div class="col-md-3">
	            <a href="{{ URL::route('photo.show', $photos[$i]->id) }}" class="thumbnail">
	            	<img src="{{ URL::to('uploads/medium_'.$photos[$i]->file_url) }}" alt="...">
	            </a>
	            <div class="caption">
	                <h3>{{ $photos[$i]->caption }}</h3>
	                <p>{{ $photos[$i]->uploader->name }}</p>
	            </div>
        	</div>
		@endfor
		</div>
@stop