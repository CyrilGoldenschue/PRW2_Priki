<header>
    <select id="domainList">
        <option class="DomainOption" data-count="{{count(\App\Models\PublicationState::where('slug', "PUB")->first()->practices)}}"  value="0">Tous ({{count(\App\Models\PublicationState::where('slug', "PUB")->first()->practices)}})</option>
        @foreach(\App\Models\Domain::all() as $domain)
            <option class="DomainOption" data-count="{{count($domain->published_practices)}}" value="{{$domain->name}}">{{$domain->name}} ({{count($domain->published_practices)}})</option>
        @endforeach
    </select>
</header>
