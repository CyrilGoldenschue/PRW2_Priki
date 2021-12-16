<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Practice;
use App\Models\PublicationState;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        Carbon::setLocale(config('app.locale'));
        $publicationState = PublicationState::where('slug', "PUB")->first();
        return view('practice')->with(["nbDays" => 5, "publicationState" => $publicationState]);
    }

    public function practice($id){
        Carbon::setLocale(config('app.locale'));
        $practice = Practice::where('id', $id)->first();
        if($practice->publication_state->slug == "PUB") {
            return view('practiceDetail')->with(["practice" => $practice]);
        }else {
            return redirect("/");
        }
    }
}
