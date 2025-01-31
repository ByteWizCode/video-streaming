@extends('videos.layout')

@section('content')
    <div class="row justify-content-center gap-3">
        <div class="col-12 col-md-6">
            <div class="d-flex align-items-center justify-content-between py-4">
                <h2 class="h2">Edit Video</h2>
                <a class="btn btn-link" href="{{ route('videos.index') }}"> Back</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('videos.update', $videos->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row gap-3">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $videos->name }}" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Source: {{ $videos->source }} </strong>
                                <input type="file" name="source" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
