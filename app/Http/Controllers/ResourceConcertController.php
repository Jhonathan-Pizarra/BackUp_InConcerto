<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConcertCollection;
use App\Http\Resources\ResorceCollection;
use App\Models\Concert;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceConcertController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.'
    ];

    public function index(Resource $resource){
        return response()->json(new ConcertCollection($resource->concerts),200);
    }

    /*
    public function show(Resource $resource, Concert $concert){
        $resourceConcert = $resource->concerts()->where('concert_id', $concert->id)->firstOrFail();
        return response()->json($resourceConcert, 200);
    }
    */

    /*
    public function store(Request $request){

        $request->validate([
            'concert_id' => 'exists:concerts,id',
            'resource_id' => 'exists:resources,id',
        ], self::$messages);

        $resource = Resource::findOrFail($request->resource_id);
        $resource->concerts()->attach($request->concert_id);
        return response()->json($resource->concerts, 201);
    }
    */

    /*
    public function update(Request $request, Concert $concert, Resource $resource){

        $request->validate([
            'concert_id' => 'exists:concerts,id',
            'resource_id' => 'exists:resources,id',
        ], self::$messages);

        $resource = $concert->resources()->where('id', $resource->id)->firstOrFail();
        $resource -> update($request->all());
        return response() -> json($resource, 200); //codigo 200 correspodnde a modificacion exitosa
    }
    */

    /*
    public function delete(Request $request, Resource $resource, Concert $concert){

        $resource = Resource::findOrFail($resource->id);
        $resource ->concerts()->detach($concert->id);
        return response() -> json(null, 204); //codigo 204 correspodnde a not found
    }
    */
}
