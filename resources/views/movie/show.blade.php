@extends('layouts.app')
@section('content')

{{$movie->title_ua}}
{{$movie->title_original}}
{{$movie->year}}
{{$movie->image_path}}
{{$movie->link_1}}
{{$movie->link_2}}
{{$movie->type->title}}
{{$movie->description}}

<div>

    <form action="{{ route('movie.destroy', $movie->id) }}" method="post">
    @csrf
    @method('delete')    
    <input type="submit" value="Delete">
    </form>

</div>

<a href='{{ route('movie.edit', $movie->id) }}'>EDIT</a>

@endsection