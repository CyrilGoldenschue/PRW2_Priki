@extends('layout')

@section('content')

    @foreach(\App\Models\Role::all() as $role)
        <p>{{ $role->name }}</p>
    @endforeach

@endsection
