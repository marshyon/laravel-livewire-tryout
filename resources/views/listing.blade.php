@extends('layout')

@section('content')
    <p>{{ $listing['id'] }}</p>
    <p>{{ $listing['title'] }}</p>
    <p>{{ $listing['description'] }}</p>
@endsection
