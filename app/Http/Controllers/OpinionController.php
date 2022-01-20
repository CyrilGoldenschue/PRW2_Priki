<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{

    /**
     * @param $id : id of the opinion on which the user wants to comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($id){

        return view('add-comment')->with(["id" => $id]);
    }

    public function store(Request $request, $id){
        $opinion = Opinion::find($id);
        $opinion->comments()->attach(Auth::user(), ['comment' => $_GET['comment'], 'points' => $_GET['points']]);
        return redirect('/practice/'.$opinion->practice->id)->with('success', "Commentaire enregistré");
    }
}
