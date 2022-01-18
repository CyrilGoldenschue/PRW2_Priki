@extends('layout')

@section('content')
    <h2>Références</h2>

    <table class="table">
        <tr>
            <th>Titre</th>
            <th>Lien</th>
            <th><a class="buttonLink btn btn-primary" href="/references/create">+</a> </th>
        </tr>
        @foreach($references as $reference)

                <tr>
                    <td>
                        {{ $reference->description }}
                    </td>
                    <td>
                        {{ $reference->url }}
                    </td>
                    <td>
                        <a class="buttonLink btn btn-primary" href="{{$reference->url}}" target="_blank">accéder</a>
                    </td>
                </tr>

        @endforeach

    </table>
@endsection
