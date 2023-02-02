@extends('layouts.app')
@section('content')

<div  class="mb-3">
@foreach($movies as $movie)
<div><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->title_ua }}</a></div>
@endforeach
</div>

<div>
{{ $movies->links() }}
</div>

@endsection