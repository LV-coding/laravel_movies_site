@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                {{ __('You are logged in!') }}
                            </div>
                            <div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="{{ __('Log out!') }}" class="btn btn-warning">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @foreach($movies as $movie)
                    
                    <div><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->title_ua }}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
