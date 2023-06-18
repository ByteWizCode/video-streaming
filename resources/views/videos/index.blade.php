@extends('videos.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-between py-4">
        <h2 class="h2">Video player</h2>
        <a class="btn btn-success mb-4" href="{{ route('videos.create') }}">Add Video</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mb-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderedless table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th class="text-center" width="280px">Action</th>
                    </tr>
                    @foreach ($videos as $video)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $video->name }}</td>
                            <td>{{ $video->source }}</td>
                            <td class="text-center">
                                <form action="{{ route('videos.destroy', $video->id) }}" method="POST">

                                    <a class="btn btn-sm btn-info" href="{{ route('videos.show', $video->id) }}">Show</a>

                                    <a class="btn btn-sm btn-primary" href="{{ route('videos.edit', $video->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    {!! $videos->links() !!}
@endsection
