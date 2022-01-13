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
            <a><b>Date de modification : </b>{{\Carbon\Carbon::parse($practice->updated_at)->translatedFormat('d F Y')}}
            </a>
        </div>
        <div class="description">
            <a><b>Description : </b></a> {{ $practice->description }}
        </div>
        @if (count($practice->opinions) != 0)
            <div class="opinions">
                <h3>Opinions</h3>
                <table class="table">
                    <tr>
                        <th>
                            Description
                        </th>
                        <th>
                            Auteur
                        </th>
                        <th>
                            Date de création
                        </th>
                        <th>
                            Nb commentaire
                        </th>
                        <th>
                            J'aime / J'aime pas
                        </th>
                    </tr>
                    @foreach($practice->opinions as $opinion)
                        <tr class="accordion" data-opinion="{{ $opinion->id }}">
                            <td>
                                {{$opinion->description}}
                            </td>
                            <td>
                                <a href="#">{{$opinion->user->fullname}}</a>
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($opinion->created_at)->translatedFormat('d F Y')}}
                            </td>
                            <td>
                                {{ count($opinion->comments) }}
                            </td>
                            <td>
                                {{ $opinion->getUpVote() }} <i class="fas fa-thumbs-up"></i>
                                / {{ $opinion->getDownVote() }} <i class="fas fa-thumbs-down"></i>
                            </td>
                        </tr>
                        @foreach($opinion->comments as $comment)
                            <tr class="panel" data-opinion_comment="{{ $opinion->id }}">
                                <td>
                                    {{$comment->pivot->comment}}
                                </td>
                                <td>
                                    <a href="#">{{$comment->fullname}}</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>

            </div>
        @endif
    </div>


@endsection
