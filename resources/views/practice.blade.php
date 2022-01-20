@extends('layout')

@section('content')


    @include('list-practices', ['practices' => $publicationState->practices, 'practicesByDay' => true])



@endsection
