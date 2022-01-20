@extends('layout')

@section('content')
    <table class="table">
        <tr>
            <th>Description</th>
            <th class="Domain">Domaine</th>
            <th>Modifié le</th>
        </tr>
        @foreach($practices as $practice)
            <tr>
                <td>
                    {{ $practice->description }}
                </td>
                <td>
                    {{ $practice->domain->name }}
                </td>
                <td>
                    {{\Carbon\Carbon::parse($practice->updated_at)->translatedFormat('d F Y')}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
