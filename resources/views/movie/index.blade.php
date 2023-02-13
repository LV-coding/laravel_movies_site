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

<div  class="mb-3  d-flex flex-row flex-wrap">


@foreach($movies as $movie)


<div class="card mb-3" style="max-width: 600px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $movie->image_path }}" class="img-fluid rounded-start" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
            <a href="{{ route('movie.show', $movie->id) }}"><h5 class="card-title">{{ $movie->title_ua }}</h5></a>
          <p class="card-text">
            Year: {{ $movie->year }}<br>
            Type: {{ $movie->type->title }}<br>
            Tags: @foreach($movie->tags as $tag)
                  {{ $tag->title }}, 
                  @endforeach
            </p>

        </div>
      </div>
    </div>
  </div>

@endforeach
</div>

<div>
{{ $movies->withQueryString()->links() }}
</div>

@endsection