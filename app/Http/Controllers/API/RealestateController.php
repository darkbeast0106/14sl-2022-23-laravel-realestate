<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealestateRequest;
use App\Http\Requests\UpdateRealestateRequest;
use App\Models\Realestate;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RealestateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestates =
            Realestate::leftJoin("users", "realestates.user_id", "users.id")
            ->select(["realestates.*","users.name as user_name"])->get();
        return response()->json($realestates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealestateRequest $request)
    {
        $realestate = new Realestate();
        $realestate->fill($request->all());
        $realestate->save();
        return response()->json($realestate, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realestate = Realestate::find($id);
        if (is_null($realestate)) {
            return response()->json(["message" => "Ilyen azonosítóval nincs ingatlan"], 404);
        }
        $user = User::find($realestate->user_id);
        $realestate->user = $user;
        return $realestate;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealestateRequest $request, $id)
    {
        $realestate = Realestate::find($id);
        if (is_null($realestate)) {
            return response()->json(["message" => "Ilyen azonosítóval nincs ingatlan"], 404);
        }
        $realestate->fill($request->all());
        $realestate->save();
        return response()->json($realestate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $realestate = Realestate::find($id);
        if (is_null($realestate)) {
            return response()->json(["message" => "Ilyen azonosítóval nincs ingatlan"], 404);
        }
        $realestate->delete();
        return response()->noContent();
    }
}
