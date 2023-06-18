@extends('videos.layout')

@section('content')
    <div class="row justify-content-center gap-3">
        <div class="col-12 col-md-6">
            <div class="d-flex align-items-center justify-content-between py-4">
                <h2 class="h2">Show Video</h2>
                <a class="btn btn-link" href="{{ route('videos.index') }}"> Back</a>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name</strong>
                        {{ $video->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="ratio ratio-16x9">
                        <video class="w-100" controls>
                            <source src="{{ asset('storage/posts/' . $video->source) }}" type="video/mp4">
                            <source src="{{ asset('storage/posts/' . $video->source) }}" type="video/mp3">
                            <source src="{{ asset('storage/posts/' . $video->source) }}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
