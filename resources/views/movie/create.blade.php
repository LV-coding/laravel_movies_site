@extends('layouts.app')
@section('content')
    <form method="post" action="{{ route('movie.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title_ua" class="form-label">Title UA</label>
            <input type="text" class="form-control" id="title_ua" placeholder="Title UA" name="title_ua"
                value="{{ old('title_ua') }}">

            @error('title_ua')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title_original" class="form-label">Title original</label>
            <input type="text" class="form-control" id="title_original" placeholder="Title original"
                name="title_original" value="{{ old('title_original') }}">

            @error('title_original')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="is_published" class="form-label">Is published</label>
            <select class="form-select" aria-label="Default select example" name="is_published" id="is_published">
                <option selected value="0">Not published</option>
                <option value="1" {{ old('is_published') == 1 ? 'selected' : '' }}>Published</option>
                @error('is_published')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" placeholder="Year" name="year" min="1900"
                max="2099" step="1" value="{{ old('year') }}">

            @error('year')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="image_path">Upload</label>
            <input type="file" class="form-control" id="image_path" name="image_path" value="{{ old('image_path') }}">

            @error('image_path')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link_1" class="form-label">Link 1</label>
            <input type="text" class="form-control" id="link_1" placeholder="Link 1" name="link_1"
                value="{{ old('link_1') }}">

            @error('link_1')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link_2" class="form-label">Link 2</label>
            <input type="text" class="form-control" id="link_2" placeholder="Link 2" name="link_2"
                value="{{ old('link_2') }}">

            @error('link_2')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="form_select_single" class="form-label">Type</label>
            <select class="form-select" aria-label="Default select example" name="type_id" value="{{ old('type_id') }}"
                id="form_select_single">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach

                @error('type_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </select>
        </div>

        <div class="mb-3">
            <label for="form_select_multiple" class="form-label">Tags</label>
            <select class="form-select" multiple aria-label="multiple select example" name="tags[]"
                id="form_select_multiple">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags')) ? 'selected' : '' }}>
                        {{ $tag->title }}</option>
                @endforeach

                @error('tags')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </select>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" placeholder="description" name="description">{{ old('description') }}</textarea>

            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
