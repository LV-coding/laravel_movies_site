@extends('layouts.app')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    @foreach($movies as $movie)

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <a href="{{ route('movie.show', $movie->id) }}">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ $movie->image_path }}" class="d-block w-100" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $movie->title_ua }}</h5>
          <p>{{ $movie->description }}</p>
        </div>
      </div>
    </a>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

      @endforeach

  </div>

@endsection