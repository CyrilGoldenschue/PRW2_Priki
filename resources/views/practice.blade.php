@extends('layout')

@section('content')
    @include('header')
    <h2>Pratiques</h2>
    <p>Mises à jour dans les <input type="number" id="Days" name="days" value="{{$nbDays}}" min="0" max="365"> jours</p>
    <table id="tablePractice" class="table">
        <tr>
            <th>Description</th>
            <th class="Domain">Domaine</th>
            <th>Modifié le</th>
        </tr>
        <a id="noPractice">Aucune pratique à afficher ici</a>
        @foreach($publicationState->practices as $practice)

                <tr onclick="document.location = '/practice/{{$practice->id}}'" class="Practice" data-date="{{$practice->updated_at}}" data-domain="{{ $practice->domain->name }}">
                    <td>
                        {{ $practice->description }}
                    </td>
                    <td class="Domain">
                        {{ $practice->domain->name }}
                    </td>
                    <td>
                       {{\Carbon\Carbon::parse($practice->updated_at)->translatedFormat('d F Y')}}
                    </td>
                </tr>

        @endforeach

    </table>
@endsection
