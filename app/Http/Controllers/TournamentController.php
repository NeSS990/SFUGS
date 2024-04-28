<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Game;
use App\Models\Participation;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TournamentController extends Controller
{
    public function index(){
        $tournaments = Tournament::all();
        return view('Tournaments.index', ['tournaments'=>$tournaments]);
    }
    public function create(){
        $games = Game::all();
        return view('Tournaments.create', ['games' => $games]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $filename = $data['logo']->getClientOriginalName();
        $data['logo']->move(Storage::path('/public/img/tournament/').'origin/',$filename);
        $thumbnail = Image::make(Storage::path('/public/img/tournament/').'origin/'.$filename);
        $thumbnail -> fit(300,300);
        $thumbnail->save(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'tournament' . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $filename));
        $data['logo'] = $filename;


        $filename = $data['background']->getClientOriginalName();
        $data['background']->move(Storage::path('/public/img/tournament/').'origin/',$filename);
        $thumbnail = Image::make(Storage::path('/public/img/tournament/').'origin/'.$filename);
        $thumbnail -> fit(300,300);
        $thumbnail->save(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'tournament' . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $filename));
        $data['background'] = $filename;


        Tournament::create($data);
        return redirect()->route('tournaments.index');
    }
    public function show($id){
        $user = Auth::user();
        $tour =Tournament::find($id);
        $isRecord =Participation::where('user_id', $user->id)->where('tournament_id', $tour->id)->exists();
        if (!$isRecord){
            $parc = true;
        }
        else{
            $parc = false;
        }
        $data = Participation::where('user_id', $user->id)->where('tournament_id', $tour->id)->get();
        return view('tournaments.show', ['tour' => $tour, 'parc' =>$parc, 'data' =>$data]);
    }

    public function post(Request $request){
        $data = $request->all();
        Participation::create($data);
        return redirect()->route('tournaments.index');
    }


    public function post2(Request $request){
        $participationId = $request->id;

        // Ваш код для обновления записи в базе данных
        $participation = Participation::find($participationId);

        if ($participation) {
            $participation->update(['confirm' => 1]);
        }
    }
}
