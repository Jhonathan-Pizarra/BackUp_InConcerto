<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Essay;
use App\Http\Resources\Essay as EssayRes;
use App\Http\Resources\EssayCollection;

class EssayController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'dateEssay.date' => 'El formato de la fecha debe ser YY/MM/DD'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        //return new EssayCollection(Essay::paginate());
        return response()->json(new EssayCollection(Essay::all()),200);  //no data + metadata
    }

    public function show(Essay $essay){
        $this->authorize('view', $essay);
        return response()->json(new EssayRes($essay),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Essay::class);

        $request->validate([
            'dateEssay' => 'required|date',
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'festival_id' => 'required|exists:festivals,id', //No disponible hasta que se fusione con la rama de relacion
        ], self::$messages);

        $essay = Essay::create($request ->all());
        return response() -> json($essay, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Essay $essay){
        //Tiene permiso:
        $this->authorize('update', $essay);

        $request->validate([
            'dateEssay' => 'date',
            'name' => 'string|max:255',
            'place' => 'string|max:255',
            'festival_id' => 'exists:festivals,id', //No disponible hasta que se fusione con la rama de relacion
        ], self::$messages);

        $essay -> update($request->all());
        return response() -> json($essay, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Essay $essay){
        //Tiene permiso:
        $this->authorize('delete', $essay);

        $essay -> delete();
        return response() -> json(null, 204); //codigo 204 correspodnde a borrado exitoso
    }
}
