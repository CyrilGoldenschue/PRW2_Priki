@extends('layout')

@section('content')

    @if($script)
        <div>
            <select id="domainList">
                <option class="DomainOption"
                        data-count="{{count(\App\Models\PublicationState::where('slug', "PUB")->first()->practices)}}"
                        value="0">Tous
                    ({{count(\App\Models\PublicationState::where('slug', "PUB")->first()->practices)}})
                </option>
                @foreach(\App\Models\Domain::all() as $domain)
                    <option class="DomainOption" data-count="{{count($domain->published_practices)}}"
                            value="{{$domain->name}}">{{$domain->name}} ({{count($domain->published_practices)}})
                    </option>
                @endforeach
            </select>
        </div>

    @endif

    <h2>Pratiques</h2>
    @if($script)
        <p>Mises à jour dans les <input type="number" id="Days" name="days" value="{{$nbDays}}" min="0" max="365"> jours </p>
    @endif

        <table @if($script) id="tablePractice" @endif class="table">
        <tr>
            <th>Description</th>
            <th class="Domain">Domaine</th>
            <th>Modifié le</th>
        </tr>
            @if($script)
                <a id="noPractice">Aucune pratique à afficher ici</a>
            @endif

        @foreach($practices as $practice)

            <tr onclick="document.location = '/practice/{{$practice->id}}'"  @if($script) class="Practice"
                data-date="{{$practice->updated_at}}" data-domain="{{ $practice->domain->name }}"  @endif>
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
    @if($script)
        <script src="{{ mix('js/changeDays.js') }}" defer></script>
    @endif
@endsection
