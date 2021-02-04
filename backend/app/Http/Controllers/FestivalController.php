<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Festival; //importamos el modelo
use App\Http\Resources\Festival as FestivalRes;
use App\Http\Resources\FestivalCollection;

class FestivalController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'description.required' => 'Es necesaria una descripción'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new FestivalCollection(Festival::paginate());
        //return response()->json(new FestivalCollection(Festival::all()),200);
    }

    public function show(Festival $festival){
        return response()->json(new FestivalRes($festival),200);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|unique:festivals|max:255', //unique:tabla
            'description' => 'required|string',
            'image' => 'required|image|dimensions:min_width=200,min_height=200',
        ], self::$messages);

        //Creamos una instancia y subimso la imagen al servidor
        $festival = new Festival($request->all());
        $path = $request->image->store('public/festivals');
        //Al campo image le setea una ruta y le guardamos en la bdd
        $festival->image = $path;
        $festival->save();

        return response()->json(new FestivalRes($festival), 201);
        //$festival = Festival::create($request ->all());
        //return response() -> json($festival, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Festival $festival){

        $request->validate([
            'name' => 'required|string|unique:festivals|max:255', //unique:tabla
            'description' => 'required|string',
        ], self::$messages);

        $festival -> update($request->all());
        return response() -> json($festival, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Festival $festival){
        $festival -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
