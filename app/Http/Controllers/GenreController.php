<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::where('id', 2)->get();
        foreach($genres as $genre){
            dump($genre->name);
        }

    }
    public function create(){
        $genresArr = [
            [
                'name'=> 'Strategy',
            ],
            [
                'name'=>'coop',
            ]
        ];
        foreach($genresArr as $genre){

            Genre::create($genre);
        }

        dd('created');
    }
    public function update(){
        $genre = Genre::find(5);
        $genre->update([
            'name'=> 'cooperative',
        ]);
        dd($genre->name);
    }
    public function delete(){
        $genre = Genre::withTrashed()->find(1);
        $genre->restore();
        dd('deleted');
    }
}
