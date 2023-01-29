@extends('layouts.app')
@section('content')


@foreach($tags as $tag)
<div>{{ $tag->id }}. {{ $tag->title }} <a href="{{ route('tag.edit', $tag->id) }}">[EDIT]</a>   

    <form action="{{ route('tag.destroy', $tag->id) }}" method="post">
    @csrf
    @method('delete')    
    <input type="submit" value="Delete">
    </form></div>
@endforeach



@endsection