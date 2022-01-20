@extends('layout')

@section('content')


    @include('list-practices', ['practices' => $publicationState->practices, 'script' => true,])



@endsection
