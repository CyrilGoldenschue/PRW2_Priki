@extends('layout')

@section('content')

    @if($practicesByDay)
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
    @if($practicesByDay)
        <p>Mises à jour dans les <input type="number" id="Days" name="days" value="{{$nbDays}}" min="0" max="365"> jours
        </p>
    @endif

    <table @if($practicesByDay) id="tablePractice" @endif class="table">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            @if($practicesByDay)
                <th class="Domain">Domaine</th> @endif
            <th>Modifié le</th>
        </tr>
        @if($practicesByDay)
            <a id="noPractice">Aucune pratique à afficher ici</a>
        @endif
        @if($practicesByDay)
            @foreach($practices as $practice)

                <tr onclick="document.location = '/practice/{{$practice->id}}'" @if($practicesByDay) class="Practice"
                    data-date="{{$practice->updated_at}}" data-domain="{{ $practice->domain->name }}" @endif>
                    <td>
                        {{ $practice->title }}
                    </td>
                    <td>
                        {{ $practice->description }}
                    </td>
                    @if($practicesByDay)
                        <td class="Domain">
                            {{ $practice->domain->name }}
                        </td>
                    @endif
                    <td>
                        {{\Carbon\Carbon::parse($practice->updated_at)->translatedFormat('d F Y')}}
                    </td>
                </tr>

            @endforeach
        @else
            @foreach($practices as $domain)
                <tr>
                    <td><h2>{{ $domain->name }}</h2></td>
                </tr>
                @foreach($domain->practices->sortby('publication_state_id') as $practice)

                    <tr onclick="document.location = '/practice/{{$practice->id}}'"
                        @if($practicesByDay) class="Practice"
                        data-date="{{$practice->updated_at}}" data-domain="{{ $practice->domain->name }}" @endif>
                        <td>
                            {{ $practice->title }}
                        </td>
                        <td>
                            {{ $practice->description }}
                        </td>
                        @if($practicesByDay)
                            <td class="Domain">
                                {{ $practice->domain->name }}
                            </td>
                        @endif
                        <td>
                            {{\Carbon\Carbon::parse($practice->updated_at)->translatedFormat('d F Y')}}
                        </td>
                    </tr>

                @endforeach
            @endforeach
        @endif

    </table>
    @if($practicesByDay)
        <script src="{{ mix('js/changeDays.js') }}" defer></script>
    @endif
@endsection
