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
				
				<div class="caption">
	                <h3>{{ $photos[$i]->caption }}</h3>
	                By: <a href="{{ URL::route('account', $photos[$i]->uploader->id) }}"> {{ $photos[$i]->uploader->name }} </a>
	                <p> {{ count($photos[$i]->likes) }} likes </p>
	            </div>

	            <a href="{{ URL::route('photo.show', $photos[$i]->id) }}" class="thumbnail">
	            	<img src="{{ URL::to('uploads/medium_'.$photos[$i]->file_url) }}" alt="...">

	            </a>

	            
	            
        	</div>
		@endfor
		</div>
@stop