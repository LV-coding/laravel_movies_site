@extends('layouts.app')
@section('content')
    <img src="{{ asset('storage/' . $movie->image_path) }}" alt="{{ asset('storage/' . $movie->image_path) }}">
    {{-- asset('storage/app/'.$movie->image_path) --}}
    <div>Title: {{ $movie->title_ua }}</div>
    <div>Title original: {{ $movie->title_original }}

        @can('view', auth()->user())
            <div class="d-flex align-items-center">
                @if ($movie->is_published)
                    <div class="btn btn-success m-1">published</div>
                @else
                    <div class="btn btn-warning m-1">not published</div>
                @endif

                <a href='{{ route('movie.edit', $movie->id) }}' class="btn btn-primary m-1">EDIT</a>
                <form action="{{ route('movie.destroy', $movie->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="DELETE" class="btn btn-danger m-1">
                </form>
            </div>
        @endcan
        <small>
            @auth
                <form action="{{ route('movie.like.store', $movie->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">
                        @if (auth()->user()->likes->contains($movie->id))
                            <img src="{{ asset('img/like.png') }}" alt="">
                        @else
                            <img src="{{ asset('img/without.png') }}" alt="">
                        @endif
                    </button>
                    {{ $movie->likes_count }}  
                    {{-- через withCount --}}
                </form>
            @endauth
            @guest
                <br><img src="{{ asset('img/without.png') }}" alt="">
                {{ $movie->likes->count() }}
            @endguest
        </small>

        <div>Year: {{ $movie->year }}</div>
        <div>Type: {{ $movie->type->title }}</div>
        <div>Tags: @foreach ($movie->tags as $tag)
                {{ $tag->title }},
            @endforeach

        </div>
        <div>Description: {{ $movie->description }}</div>



        <div class="ratio ratio-16x9">
            <iframe src="{{ $movie->link_1 }}" title="Mirror" allowfullscreen></iframe>
        </div>
        <div class="ratio ratio-16x9">
            <iframe src="{{ $movie->link_2 }}" title="Alt mirror" allowfullscreen></iframe>
        </div>
    @endsection
