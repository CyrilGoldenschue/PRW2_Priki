@extends('layout')

@section('content')

    @include('list-practices', ['practices' => $domains, 'practicesByDay' => false])

@endsection
