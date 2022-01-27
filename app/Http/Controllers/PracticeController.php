<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
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

    public function publish($id, Request $request)
    {
        $practice = Practice::find($id);
        if ($request->user()->cannot('publish', $practice)) {
            abort(403);
        }
        $practice->publish();
        return redirect(route('home'))->with('success',"Pratique publiée");
    }

    public function edit($id, Request $request){
        $practice = Practice::find($id);
        if ($request->user()->can('edit', $practice)) {
            abort(403);
        }
        return view('edit-practice')->with(["practice" => $practice]);
    }

    public function update(){
        if(Practice::where('title', '=', $_POST['title'])->count() == 0){
            $practice = Practice::find($_POST['practice_id']);

            Changelog::create([
                'user_id' => Auth::user()->id,
                'practice_id' => $practice->id,
                'reason' => $_POST['reason'],
                'previously' => $practice->title
            ]);

            $practice->title = $_POST['title'];
            $practice->save();

            return redirect("/practice/".$practice->id);
        }else{
            return redirect("/practice/".$_POST['practice_id']."/edit");
        }
    }
}
