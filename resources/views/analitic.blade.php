@extends('layouts.app')
@section('content')
    <div>

        <div>Admin: {{ $adminsCount }}</div>
        <div>Users: {{ $usersCount }}</div><br>
        <div>Published movies: {{ $moviesPublishedCount }}</div>
        <div>Not published movies: {{ $moviesNotPublishedCount }}</div><br>
        <div>Types: {{ $typesCount }}</div>
        <div>Tags: {{ $tagsCount }}</div>
    </div>
@endsection
