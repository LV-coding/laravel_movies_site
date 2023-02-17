@extends('layouts.app')
@section('content')
    <h3>Result searching ({{ $moviesCount }}) :</h3>
    <div class="mb-3  d-flex flex-row flex-wrap">
        @foreach ($movies as $movie)
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $movie->image_path) }}" class="img-fluid rounded-start" alt=""
                            style="width:280px; height:360px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="{{ route('movie.show', $movie->id) }}">{{ $movie->title_ua }}</a>
                                @can('view', auth()->user())
                                    @if ($movie->is_published)
                                        <p class="text-success"><small>published</small></p>
                                    @else
                                        <p class="text-danger"><small>not published</small></p>
                                    @endif
                                @endcan
                            </h5>
                            <p class="card-text">
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
                                        </form>
                                    @endauth
                                    @guest
                                        <img src="{{ asset('img/without.png') }}" alt="">
                                    @endguest
                                    {{ $movie->likes_count }}
                                    {{-- через withCount --}}
                                </small><br>
                                Year: {{ $movie->year }}<br>
                                Type: {{ $movie->type->title ?? '' }}<br>
                                Tags: @foreach ($movie->tags as $tag)
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
