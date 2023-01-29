@extends('layouts.app')
@section('content')


<div>Title: {{$movie->title_ua}}</div>
<div>Title original: {{$movie->title_original}}
<div>Year: {{$movie->year}}</div>
<div>{{$movie->image_path}}</div>
<div>Mirror:{{$movie->link_1}}</div>
<div>Alr mirror: {{$movie->link_2}}</div>
<div>Type: {{$movie->type->title}}</div>
<div>Tags: @foreach($movie->tags as $tag)
                {{ $tag->title }}, 
           @endforeach

</div>
<div>Description: {{$movie->description}}</div>

<div>

    <form action="{{ route('movie.destroy', $movie->id) }}" method="post">
    @csrf
    @method('delete')    
    <input type="submit" value="Delete">
    </form>

</div>

<a href='{{ route('movie.edit', $movie->id) }}'>EDIT</a>

@endsection