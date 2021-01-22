<?php

namespace App\Http\Controllers;
use App\Calendar;
use App\Http\Resources\Calendar as CalendarRes;
use App\Http\Resources\CalendarCollection;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new CalendarCollection(Calendar::paginate());
    }

    public function show(Calendar $calendar){
        return response()->json(new CalendarRes($calendar),200);
    }

    public function store(Request $request){
        $calendar = Calendar::create($request ->all());
        return response() -> json($calendar, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Calendar $calendar){
        $calendar -> update($request->all());
        return response() -> json($calendar, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Calendar $calendar){
        $calendar -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
