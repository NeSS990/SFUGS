<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use App\Models\Tournament;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $parc = Participation::with('tournament')->get();

        return view('auth.index', ['parc'=>$parc]);
    }
}
