<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $tournaments_count = Tournament::all()->count();
        return view('admin.home.index', ['tournaments_count'=>$tournaments_count]);
    }
}
