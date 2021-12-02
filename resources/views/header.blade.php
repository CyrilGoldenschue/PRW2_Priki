<header>
    <h1>Priki</h1>

    <select id="domainList">
        <option class="DomainOption" value="0">Tous ({{count(\App\Models\PublicationState::where('slug', "PUB")->first()->practices)}})</option>
        @foreach(\App\Models\Domain::all() as $domain)
            <option class="DomainOption" value="{{$domain->id}}">{{$domain->name}} ({{count($domain->published_practices)}})</option>
        @endforeach
    </select>
</header>
