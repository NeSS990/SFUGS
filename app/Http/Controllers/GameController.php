<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GameController extends Controller
{
    public function index(){
        $games = Game::all();
        return view('games', ['games'=>$games]);

    }
    public function create(){
        $genres = Genre::all();
        return view('Games.create', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $filename = $request->file('image')->getClientOriginalName();
        $data['image']->move(Storage::path('/public/img/games/').'origin/',$filename);
        $thumbnail = Image::make(Storage::path('/public/img/games/').'origin/'.$filename);
        $thumbnail -> fit(250,250);
        $thumbnail->save(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'games' . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $filename));
        $data['image'] = $filename;
        Game::create($data);
        return redirect()->route('games.index');
    }
}
