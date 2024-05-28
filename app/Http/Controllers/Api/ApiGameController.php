<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class ApiGameController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $games = Game::all();
            return response()->json($games);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve games'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function create(Request $request)
    {
        $title = $request->input("title");
        $genre_id = $request->input("genre_id");
        $description = $request->input("description");
        $image = $request->file("image");

        try {
            $existingGame = Game::where('genre_id', $genre_id)
                ->where('title', $title)
                ->first();

            if ($existingGame) {
                return response()->json(['error' => 'Game already exists'], 409);
            }

            // Обработка изображения
            if ($image) {
                $imageFilename = $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/img/games/origin', $imageFilename);
                $thumbnailPath = storage_path('app/public/img/games/thumbnail/' . $imageFilename);

                $thumbnail = Image::make(storage_path('app/public/img/games/origin/' . $imageFilename));
                $thumbnail->fit(250, 250);
                $thumbnail->save($thumbnailPath);

                $imageFilename = str_replace('public/', '', $imagePath); // Убираем 'public/' из пути для сохранения в базе данных
            }

            Game::create([
                'title' => $title,
                'genre_id' => $genre_id,
                'description' => $description,
                'image' => $imageFilename ?? null
            ]);

            return response()->json(['success' => 'Game created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add Game'], 500);
        }
    }
}
