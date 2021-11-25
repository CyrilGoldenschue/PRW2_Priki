@extends('layout')

@section('content')

    @foreach(\App\Models\Domain::all() as $domain)
        <p>{{ $domain->name }}</p>
    @endforeach

@endsection
