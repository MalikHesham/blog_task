@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Create Post</a>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->created_at->format('Y-m-d') }}</td>
            <td>
                <!-- <a href="{{ route('posts.show',['post' => $post['id']]) }}" class="btn btn-info" style="margin-bottom: 20px;">View</a> -->
                <!-- <a href="{{ route('posts.edit',['post' => $post['id']]) }}" class="btn btn-secondary" style="margin-bottom: 20px;">Edit</a> -->
                <!-- <button type="button" class="btn btn-danger" style="margin-bottom: 20px;">Delete</button> -->
                <x-button type='primary' href="{{ route('posts.show',['post' => $post->id]) }}" >view</x-button>
                <x-button type='secondary' href="{{ route('posts.edit',['post' => $post->id]) }}" >Edit</x-button>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
                Delete
                </button>
            </td>
                <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to remove '{{$post->title}}' from database?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <form method="POST" action="{{route('posts.destroy', ['post'=>$post->id])}}">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger">Confirm</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
        </tr>
    @endforeach
    </tbody>
</table>
{{$posts->links("pagination::bootstrap-4")}}
@endsection
