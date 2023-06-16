@extends('videos.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Videos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('videos.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $video->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <video width="100%" height="100%" controls>
            <source src="{{ asset('storage/posts/' . $video->source) }}" type="video/mp4">
            <source src="{{ asset('storage/posts/' . $video->source) }}" type="video/mp3">
            <source src="{{ asset('storage/posts/' . $video->source) }}" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        </div>
    </div>
@endsection