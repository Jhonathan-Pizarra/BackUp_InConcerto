<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Concert;
use App\Http\Resources\Resource as ConcertResourceRes;
use App\Http\Resources\ResorceCollection;

use Illuminate\Http\Request;

class ConcertResourceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'name.unique' => 'Ya existe uno con ese nombre',
        'numeric' => 'El campo :attribute debe ser un número'
    ];

    public function index(Concert $concert){
        return response()->json(ConcertResourceRes::collection($concert->resources),200);
    }

    public function show(Concert $concert, Resource $resource){
        $resource = $concert->resources()->where('id', $resource->id)->firstOrFail();
        return response()->json($resource, 200);
    }

    public function store(Request $request, Concert $concert){

        $request->validate([
            'name' => 'required|string|unique:resources|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
        ], self::$messages);

        $resource = $concert->resources()->save(new Resource($request->all()));
        return response()->json($resource, 201);
    }

    public function update(Request $request, Concert $concert, Resource $resource){

        $request->validate([
            'name' => 'required|string|unique:resources|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
        ], self::$messages);

        $resource = $concert->resources()->where('id', $resource->id)->firstOrFail();
        $resource -> update($request->all());
        return response() -> json($resource, 200); //codigo 200 correspodnde a modificacion exitosa

    }

    public function delete(Request $request, Concert $concert, Resource $resource){
        $resource = $concert->resources()->where('id', $resource->id)->firstOrFail();
        $resource -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
