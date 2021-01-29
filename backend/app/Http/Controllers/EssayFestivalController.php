<?php

namespace App\Http\Controllers;

use App\Essay;
use App\Festival;
use App\Http\Resources\Essay as EssayRes;
use App\Http\Resources\EssayCollection;

use Illuminate\Http\Request;

class EssayFestivalController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'dateEssay.date' => 'El formato de la fecha debe ser YY/MM/DD'
    ];

    public function index(Festival $festival){
        return response()->json(EssayRes::collection($festival->essays),200);
    }

    public function show(Festival $festival, Essay $essay){
        $essay = $festival->essays()->where('id', $essay->id)->firstOrFail();
        return response()->json($essay, 200);
    }

    public function store(Request $request, Festival $festival){

        $request->validate([
            'dateEssay' => 'required|date',
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'festival_id' => 'required|exists:festivals,id', //No disponible hasta que se fusione con la rama de relacion
        ], self::$messages);

        $essay = $festival->essays()->save(new Essay($request->all()));
        return response()->json($essay, 201);
    }

    public function update(Request $request, Festival $festival, Essay $essay){

        $request->validate([
            'dateEssay' => 'required|date',
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'festival_id' => 'required|exists:festivals,id', //No disponible hasta que se fusione con la rama de relacion
        ], self::$messages);

        $essay = $festival->essays()->where('id', $essay->id)->firstOrFail();
        $essay -> update($request->all());
        return response() -> json($essay, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Festival $festival,  Essay $essay){
        $essay = $festival->essays()->where('id', $essay->id)->firstOrFail();
        $essay -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }


}
