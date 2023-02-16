@extends('layouts.app')
@section('content')
    <div class="mb-3">
        <form action="{{ route('movie.index') }}" method="get">
            {{-- FILTERING --}}
            <div class="d-flex">
                <div class="m-1">
                    <p>Types (choose one):</p>
                </div>
                <div class="form-check m-1">
                    <input class="form-check-input" type="radio" name="type_id" id="all_types" value="0" checked>
                    <label class="form-check-label" for="all_types">All types</label>
                </div>
                @foreach ($types as $type)
                    <div class="form-check m-1">
                        <input {{ $type->id == Request::get('type_id') ? 'checked' : '' }} class="form-check-input"
                            type="radio" name="type_id" id="type_{{ $type->title }}" value="{{ $type->id }}">
                        <label class="form-check-label" for="type_{{ $type->title }}">{{ $type->title }}</label>
                    </div>
                @endforeach
            </div>
            {{-- SORTING --}}
            <div class="mb-1 d-flex">
                <div class="m-1">
                    <p>Ordering:</p>
                </div>
                @foreach ($sorting_arr as $sorting_item)
                    <div class="form-check m-1">
                        <input {{ $sorting_item[0] == Request::get('sorting') ? 'checked' : '' }} class="form-check-input"
                            type="radio" name="sorting" id="sort_{{ $sorting_item[0] }}" value="{{ $sorting_item[0] }}">
                        <label class="form-check-label" for="sort_{{ $sorting_item[0] }}">{{ $sorting_item[1] }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Show</button>
        </form>
    </div>

    <div class="mb-3  d-flex flex-row flex-wrap">


        @foreach ($movies as $movie)
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $movie->image_path) }}" class="img-fluid rounded-start"
                            alt="" style="width:280px; height:360px">
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
                                    {{ $movie->likes->count() }}
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
