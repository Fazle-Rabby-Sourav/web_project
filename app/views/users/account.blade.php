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
	</div>
@stop