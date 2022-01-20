@extends('layout')

@section('content')

    @include('list-practices', ['practices' => $practices, 'script' => false])

@endsection
