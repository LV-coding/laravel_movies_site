@extends('layouts.app')
@section('content')
    <form method="post" action="{{ route('type.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                value="{{ old('title') }}">

            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
