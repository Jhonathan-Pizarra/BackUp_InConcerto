<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Http\Resources\Resource as ResourceRes;
use App\Http\Resources\ResorceCollection;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'name.unique' => 'Ya existe uno con ese nombre',
        'numeric' => 'El campo :attribute debe ser un número'
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        //return new ResorceCollection(Resource::paginate());
        return response()->json(new ResorceCollection(Resource::all()),200);  //no data + metadata
    }

    public function show(Resource $resource){
        $this->authorize('view', $resource);
        return response()->json(new ResourceRes($resource),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Resource::class);

        $request->validate([
            'name' => 'required|string|unique:resources|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
        ], self::$messages);

        $resource = Resource::create($request ->all());
        return response() -> json($resource, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Resource $resource){
        //Tiene permiso:
        $this->authorize('update', $resource);

        $request->validate([
            'name' => 'string|unique:resources|max:255',
            'quantity' => 'string',
            'description' => 'string',
        ], self::$messages);

        $resource -> update($request->all());
        return response() -> json($resource, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Resource $resource){
        //Tiene permiso:
        $this->authorize('delete', $resource);

        $resource -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
