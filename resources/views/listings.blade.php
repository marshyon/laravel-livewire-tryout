@extends('layout')

@section('content')
    <h1>{{ $heading }} </h1>



    @foreach ($listings as $listing)
        <p>{{ $listing['id'] }}</p>
        <p><a href="/listing/{{ $listing['id'] }}">{{ $listing['title'] }}</a></p>
        <p>{{ $listing['description'] }}</p>
    @endforeach
@endsection
