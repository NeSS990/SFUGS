<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participation;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function getUserDetails()
    {
        return response(['user'=>auth()->user()], 200);
    }
    // ApiUserController.php

    public function getUserTournaments($userId)
    {
        try {
            $participations = Participation::with('tournament')
                ->where('user_id', $userId)
                ->get();

            $tournaments = $participations->map(function ($participation) {
                return $participation->tournament;
            });

            return response()->json($tournaments, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch tournaments'], 500);
        }
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
