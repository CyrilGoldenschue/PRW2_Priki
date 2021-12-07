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
        setLocale(LC_TIME, 'French');
        $publicationState = PublicationState::where('slug', "PUB")->first();
        return view('practice')->with(["nbDays" => 5, "publicationState" => $publicationState]);
    }

}
