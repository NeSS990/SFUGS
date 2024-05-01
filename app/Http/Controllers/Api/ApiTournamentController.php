<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;

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
