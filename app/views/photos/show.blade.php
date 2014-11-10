@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alerts')
            <h3>{{ $photo->caption }}</h3>
            <a href="{{ URL::route('photo.show', $photo->id) }}" class="thumbnail">
                <img src="{{ URL::to('uploads/original_'.$photo->file_url) }}" alt="...">
            </a>

            @if(!$isLiked)
                <a href="{{ URL::route('photo.like.add', $photo->id) }}" class="btn btn-xs btn-primary"><3 Like</a>
            @else
                <a href="{{ URL::route('photo.like.remove', $photo->id) }}" class="btn btn-xs btn-primary">X Unlike</a>
            @endif
            <a href="#" data-toggle="modal" data-target="#myModal" >{{ count($photo->likes) }} person likes this.</a>

            <p>{{ $photo->details }}</p>

            <p>{{ $photo->created_at }}</p>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">People who likes this photo</h4>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <?php foreach ($photo->likes as $key => $like): ?>
                            <a href="{{ URL::route('account', $like->liker->id) }}" class="list-group-item">{{ $like->liker->name }}</a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@stop