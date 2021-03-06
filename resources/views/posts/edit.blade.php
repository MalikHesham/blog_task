@extends('layouts.app')
@section('title')Edit Page @endsection

@section('content')
<div class="container">
<form method="POST" action="{{route('posts.update', ['post'=>$post->id])}}">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    @error('title')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="description">Description</label>
        @error('description')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <textarea class="form-control" name="description" id="description"> {{$post->description}}</textarea>
    </div>

    <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select class="form-control" name="user_id" id="post_creator">
        @foreach(App\Models\User::all() as $user)
            <option value="{{$user->id}}" {{$user->id == $post->user_id? 'selected' : ''}}>{{$user->name}}</option>
        @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
</div>
@endsection
