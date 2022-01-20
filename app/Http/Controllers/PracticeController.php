<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\PublicationState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    //
    public function show($id){
        Carbon::setLocale(config('app.locale'));
        $practice = Practice::find($id);
        if($practice->publication_state->slug == "PUB") {
            return view('practiceDetail')->with(["practice" => $practice]);
        }else {
            return redirect("/");
        }
    }

    public function showAll(){
        Carbon::setLocale(config('app.locale'));
        $practices = Practice::all();
        return view('list-practices')->with(["practices" => $practices]);
    }
}
