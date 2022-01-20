<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use App\Models\PublicationState;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PracticeController extends Controller
{
    //
    public function show($id)
    {
        Carbon::setLocale(config('app.locale'));
        $practice = Practice::find($id);
        return view('practiceDetail')->with(["practice" => $practice]);
    }

    public function showAll()
    {
        if (!Gate::allows('list-all-practices', Auth::user())) {
            abort(403);
        }
        Carbon::setLocale(config('app.locale'));
        $domains = Domain::all();
        return view('practices')->with(["domains" => $domains]);
    }
}
