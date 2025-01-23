<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngatlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ingatlan::with('kategoria')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'leiras' => 'string',
            'hirdetesDatuma' => 'date',
            'tehermentes' => 'boolean|required',
            'ar' => 'integer|required',
            'kepUrl' => 'string',
            'kategoria' => 'integer|required|exists:kategoriak,id',
        ]);

        if ($validator->fails()){
            //return response()->json(['message' => 'Hiányos adatok'], 400);
            return response('Hiányos adatok!',400);
            //return response()->json($validator->errors(), 400);

        }
        $ingatlan = Ingatlan::create($request->all());
        return response()->json(['Id' => $ingatlan->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingatlan $ingatlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingatlan $ingatlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ingatlan = Ingatlan::find($id);
        if (!$ingatlan){
            return response('Az ingatlan nem létezik!',404);
        }
        $ingatlan->delete();
        return response('', 204);
    }
}
