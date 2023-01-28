@extends('layouts.app')
@section('content')

<form method="post" action="{{ route('movie.update', $movie->id) }}">
    @csrf
    @method('put') 
<div class="mb-3">
  <label for="title_ua" class="form-label">Title UA</label>
  <input type="text" class="form-control" id="title_ua" placeholder="Title UA" name="title_ua" value="{{ $movie->title_ua }}">

  @error('title_ua')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="title_original" class="form-label">Title original</label>
  <input type="text" class="form-control" id="title_original" placeholder="Title original" name="title_original" value="{{ $movie->title_original }}">

  @error('title_original')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="year" class="form-label">Year</label>
  <input type="number" class="form-control" id="year" placeholder="Year" name="year" min="1900" max="2099" step="1" value="{{ $movie->year }}">

  @error('year')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="input-group mb-3">
  <label class="input-group-text" for="image_path">Upload</label>
  <input type="file" class="form-control" id="image_path" name="image_path" value="{{ $movie->image_path }}">

  @error('image_path')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="link_1" class="form-label">Link 1</label>
  <input type="text" class="form-control" id="link_1" placeholder="Link 1" name="link_1" value="{{ $movie->link_1 }}">

  @error('link_1')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="link_2" class="form-label">Link 2</label>
  <input type="text" class="form-control" id="link_2" placeholder="Link 2" name="link_2" value="{{ $movie->link_2 }}">

  @error('link_2')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<select class="form-select" aria-label="Default select example" name="type_id" >
    @foreach($types as $type)
    <option 
    {{ $type->id == $movie->type->id ? 'selected' : ''}}
    value="{{ $type->id }}">{{ $type->title }}</option>
    @endforeach

    @error('type_id')
    <p class="text-danger">{{ $message}}</p>
    @enderror
  </select>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="description" placeholder="description" name="description">{{ $movie->description }}</textarea>

  @error('description')
  <p class="text-danger">{{ $message}}</p>
  @enderror
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

@endsection