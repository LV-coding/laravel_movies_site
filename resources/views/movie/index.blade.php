@extends('layouts.app')
@section('content')

<div  class="mb-3">
    <form action="{{ route('movie.index') }}" method="get">

        <div class="mb-3">
            <div>
                <h6>Types (choose one)</h6>
            </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type_id" id="all_types" value="0" checked>
        <label class="form-check-label" for="all_types">All types</label>
        </div>
        @foreach($types as $type)
        <div class="form-check">
        <input 
        {{ $type->id == Request::get('type_id') ? 'checked' : ''}}
        
        class="form-check-input" type="radio" name="type_id" id="type_{{ $type->title }}" value="{{ $type->id }}">
        <label class="form-check-label" for="type_{{ $type->title }}">{{ $type->title }}</label>
        </div>
        @endforeach
    </div>
            <button type="submit" class="btn btn-primary">Show</button>
    </form>    
</div>

<div  class="mb-3">
@foreach($movies as $movie)
<div><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->title_ua }}</a></div>
@endforeach
</div>

<div>
{{ $movies->withQueryString()->links() }}
</div>

@endsection