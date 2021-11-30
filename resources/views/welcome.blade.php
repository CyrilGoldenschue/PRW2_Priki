@extends('layout')

@section('content')

    <h2>Pratiques</h2>
    <p>Mises à jour dans les <input type="number" id="Days" name="days" value="{{$nbDays}}" min="0" max="365"> jours</p>
    <table id="tablePractice" class="table">
        <tr>
            <th>Description</th>
            <th>Domaine</th>
            <th>Modifié le</th>
        </tr>
        <a id="noPractice">Aucune pratique à afficher ici</a>
        @foreach($publicationState->practices as $practice)
            <tr class="Practice" data-date="{{$practice->updated_at}}">
                <td>
                    {{ $practice->description }}
                </td>
                <td>
                    {{ $practice->domain->name }}
                </td>
                <td>
                    {{ $practice->updated_at->isoformat('d MMMM Y', 'Europe') }}
                </td>
            </tr>
        @endforeach

    </table>
@endsection
