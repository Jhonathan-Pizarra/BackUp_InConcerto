<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Http\Resources\Calendar as CalendarRes;
use App\Http\Resources\CalendarCollection;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date' => 'El campo :attribute debe tener el formato YYYY-MM-DD.',
    ];

    //Vamos a hacer controladores, tareas que debe realizar
    public function index(){
        return new CalendarCollection(Calendar::paginate());
    }

    public function show(Calendar $calendar){
        //Tiene permiso:
        $this->authorize('view', $calendar);

        return response()->json(new CalendarRes($calendar),200);
    }

    public function store(Request $request){
        //Tiene permiso:
        $this->authorize('create', Calendar::class);

        $request->validate([
            'checkIn_Artist' => 'required|date',
            'checkOut_Artist' => 'required|date',
            'comingFrom' => 'required|string|max:255',
            'flyNumber' => 'required|string'

        ], self::$messages);

        $calendar = Calendar::create($request ->all());
        return response() -> json($calendar, 201); //codigo 201 correspodnde a create
    }

    public function update(Request $request, Calendar $calendar){
        //Tiene permiso:
        $this->authorize('update', $calendar);

        $request->validate([
            'checkIn_Artist' => 'date',
            'checkOut_Artist' => 'date',
            'comingFrom' => 'string|max:255',
            'flyNumber' => 'string'

        ], self::$messages);

        $calendar -> update($request->all());
        return response() -> json($calendar, 200); //codigo 200 correspodnde a modificacion exitosa
    }

    public function delete(Request $request, Calendar $calendar){
        //Tiene permiso:
        $this->authorize('delete', $calendar);

        $calendar -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
