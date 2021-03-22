@extends('layouts.app')
@section('title')Create Page @endsection

@section('content')
<div class="container">
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
        @error('title')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description"> </textarea>
        @error('description')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select name="user_id" class="form-control" id="post_creator">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
</form>
</div>
@endsection
