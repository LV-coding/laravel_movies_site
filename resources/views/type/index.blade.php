@extends('layouts.app')
@section('content')
    @foreach ($types as $type)
        <div>{{ $type->id }}. {{ $type->title }} <a href="{{ route('type.edit', $type->id) }}">[EDIT]</a>

            <form action="{{ route('type.destroy', $type->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </div>
    @endforeach
@endsection
