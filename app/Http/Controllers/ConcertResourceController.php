<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Concert;
use App\Http\Resources\Resource as ConcertResourceRes;
use App\Http\Resources\ResorceCollection;

use Illuminate\Http\Request;

class ConcertResourceController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.'
    ];

    public function index(Concert $concert){
        return response()->json(new ResorceCollection($concert->resources),200);
    }

    public function show(Concert $concert, Resource $resource){
        $concertResource = $concert->resources()->where('resource_id', $resource->id)->firstOrFail();
        return response()->json($concertResource, 200);
    }

    public function store(Request $request){

        $request->validate([
            'concert_id' => 'exists:concerts,id',
            'resource_id' => 'exists:resources,id',
        ], self::$messages);

        $concert = Concert::findOrFail($request->concert_id);
        $concert->resources()->attach($request->resource_id);
        return response()->json($concert->resources, 201);
    }

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

    public function delete(Request $request, Concert $concert, Resource $resource){

        $concert = Concert::findOrFail($concert->id);
        $concert ->resources()->detach($resource->id);
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
