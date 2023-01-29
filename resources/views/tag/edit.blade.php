@extends('layouts.app')
@section('content')

<form method="post" action="{{ route('tag.update', $tag->id) }}">
  @csrf
  @method('put') 

<div class="mb-3">
  <label for="title" class="form-label">Tag</label>
  <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $tag->title }}">

  @error('title')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

@endsection