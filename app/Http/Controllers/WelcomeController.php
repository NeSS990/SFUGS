<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $tournaments = Tournament::all();
        return view('welcome', ['tournaments'=> $tournaments]);
    }
    public function show(){
        $qwe = Tournament::all();
        return view('test', ['tours'=>$qwe]);
    }
}
