@extends('layout')

@section('content')

    <h2>Pratique</h2>

    <div class="container">

        <div class="domain_autor">
            <a><b>Domaine : </b> {{ $practice->domain->name }} </a>
            <a><b>Auteur : </b>{{ $practice->user->fullname }}</a>
        </div>
        <div class="date">
            <a><b>Date de création : </b>{{\Carbon\Carbon::parse($practice->created_at)->translatedFormat('d F Y')}}</a>
            <a><b>Date de modification : </b>{{\Carbon\Carbon::parse($practice->updated_at)->translatedFormat('d F Y')}}</a>
        </div>
        <div class="description">
            <a><b>Description : </b></a> {{ $practice->description }}
        </div>

    </div>


@endsection
