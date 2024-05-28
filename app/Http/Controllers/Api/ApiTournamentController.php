<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Participation;
use Illuminate\Http\Request;
use App\Models\Tournament;
use mysql_xdevapi\Exception;

class ApiTournamentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Возвращаем все турниры
        return Tournament::all();
    }


    public function createTour(Request $request)
    {
        $title = $request->input("title");
        $game_id = $request->input("game_id");
        $description = $request->input("description");
        $logo = $request->file("logo");
        $background = $request->file("background");

        try {
            // Проверка на существование записи
            $existingTour = Tournament::where('game_id', $game_id)
                ->where('title', $title)
                ->first();

            // Если запись уже существует, вернуть ошибку
            if ($existingTour) {
                return response()->json(['error' => 'Tournament already exists'], 409);
            }

            // Обработка логотипа
            $logoFilename = $logo->getClientOriginalName();
            $logo->move(storage_path('app/public/img/tournament/origin'), $logoFilename);
            $logoThumbnail = Image::make(storage_path('app/public/img/tournament/origin/' . $logoFilename));
            $logoThumbnail->fit(300, 300);
            $logoThumbnail->save(storage_path('app/public/img/tournament/thumbnail/' . $logoFilename));

            // Обработка фона
            $backgroundFilename = $background->getClientOriginalName();
            $background->move(storage_path('app/public/img/tournament/origin'), $backgroundFilename);
            $backgroundThumbnail = Image::make(storage_path('app/public/img/tournament/origin/' . $backgroundFilename));
            $backgroundThumbnail->fit(300, 300);
            $backgroundThumbnail->save(storage_path('app/public/img/tournament/thumbnail/' . $backgroundFilename));

            // Создание новой записи
            Tournament::create([
                'title' => $title,
                'game_id' => $game_id,
                'description' => $description,
                'logo' => $logoFilename,
                'background' => $backgroundFilename
            ]);

            return response()->json(['success' => 'Tournament created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add Tournament'], 500);
        }
    }


    public function createParc(Request $request)
    {
        $user_id = $request->input('user_id');
        $tour_id = $request->input('tournament_id');
        try {
            // Проверка на существование записи
            $existingParticipation = Participation::where('user_id', $user_id)
                ->where('tournament_id', $tour_id)
                ->first();

            // Если запись уже существует, вернуть ошибку
            if ($existingParticipation) {
                return response()->json(['error' => 'Participation already exists'], 409);
            }

            // Создание новой записи
            Participation::create(['user_id' => $user_id, 'tournament_id' => $tour_id]);

            return response()->json(['success' => 'Participation created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add Participation'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Возвращаем турнир по указанному ID
        return Tournament::findOrFail($id);
    }

    /**
     * Get tournaments by game.
     *
     * @param  int  $gameId
     * @return \Illuminate\Http\Response
     */
    public function getTournamentsByGame($gameId)
{
    try {
        // Получаем турниры по указанной игре
        $tournaments = Tournament::where('game_id', $gameId)->get();
        return response()->json($tournaments);
    } catch (\Exception $e) {
        // Обработка исключения
        return response()->json(['error' => 'Failed to retrieve tournaments'], 500);
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
}
