<?php

namespace App\Http\Controllers;
use App\Resource;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return Resource::all();
    }

    public function show(Resource $resource){
        return $resource;
    }

    public function store(Request $request){
        $resource = Resource::create($request ->all());
        return response() -> json($resource, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Resource $resource){
        $resource -> update($request->all());
        return response() -> json($resource, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Resource $resource){
        $resource -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }
}
