<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;

class OpinionController extends Controller
{


    public function create(){
        return view('add-comment');
    }

    public function store(){

    }
}
