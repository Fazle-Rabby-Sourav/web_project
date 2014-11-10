@extends('layouts.default')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<div class="page-header">
    			<h2>
    				{{ $user->name }}'s Account

    				@if(Auth::user()->id == $user->id)
    					<a class="btn btn-primary pull-right" href="{{ URL::route('account.edit', Auth::user()->id) }}">Edit Profile</a>
    				@endif
    			</h2>
    		</div>

    		<p>Full Name:</p>
    		<p class="lead">{{ $user->name }}</p>

    		<p>Email Address:</p>
    		<p class="lead">{{ $user->email }}</p>

            <p>Email Address:</p>
            <p class="lead">{{ $user->address }}</p>
            
            <p>Gear:</p>
            <p class="lead">{{ $user->gear }}</p>

            <p>Contact:</p>
            <p class="lead">{{ $user->contact }}</p>
            
            <p>Website:</p>
            <p class="lead">{{ $user->website }}</p>

    		<p>Joined iPhoto on:</p>
    		<p class="lead">{{ $user->created_at }}</p>

		</div>

        @for($i=0; $i<count($user->uploadedPhotos); $i++)

            @if($i == 0)
                <div class="row">
            @elseif($i%4 == 0)
                </div>
                <div class="row">
            @endif
                
            <div class="col-md-3">
                <a href="{{ URL::route('photo.show', $user->uploadedPhotos[$i]->id) }}" class="thumbnail">
                    <img src="{{ URL::to('uploads/medium_'.$user->uploadedPhotos[$i]->file_url) }}" alt="...">
                </a>
                <div class="caption">
                    <h3>{{ $user->uploadedPhotos[$i]->caption }}</h3>
                    <p>{{ $user->uploadedPhotos[$i]->uploader->name }}</p>
                </div>
            </div>
        @endfor
        </div>	</div>
@stop