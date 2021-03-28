<?php

namespace App\Http\Controllers;

use App\Transport;
use App\Calendar;
use App\Http\Resources\Transport as CalendarTransRes;
use App\Http\Resources\TransportCollection;
use Illuminate\Http\Request;

class CalendarTransportController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'numeric' => 'El campo :attribute no es un número.',
    ];

    public function index(Calendar $calendar){
        return response()->json(CalendarTransRes::collection($calendar->transports),200);
    }

    public function show(Calendar $calendar, Transport $transport){
        $transport = $calendar->transports()->where('id', $transport->id)->firstOrFail();
        return response()->json($transport, 200);
    }

    public function store(Request $request, Calendar $calendar){

        $request->validate([
            'type' => 'required|string|max:255',
            'capacity' => 'required|numeric|integer',
            'instruments_capacity' => 'required|numeric',
            'disponibility' => 'required|boolean',
            'licence_plate' => 'required|string|max:255',
            'calendar_id' =>'required|exists:calendars,id'

        ], self::$messages);

        $transport = $calendar->transports()->save(new Transport($request->all()));
        return response()->json($transport, 201);
    }


    public function update(Request $request, Calendar $calendar, Transport $transport){

        $request->validate([
            'type' => 'required|string|max:255',
            'capacity' => 'required|numeric|integer',
            'instruments_capacity' => 'required|numeric',
            'disponibility' => 'required|boolean',
            'licence_plate' => 'required|string|max:255',
            'calendar_id' =>'required|exists:calendars,id'

        ], self::$messages);

        $transport = $calendar->transports()->where('id', $transport->id)->firstOrFail();
        $transport -> update($request->all());
        return response() -> json($transport, 200); //codigo 200 correspodnde a modificacion exitosa

    }

    public function delete(Request $request, Calendar $calendar, Transport $transport){
        $transport = $calendar->transports()->where('id', $transport->id)->firstOrFail();
        $transport -> delete();
        return response() -> json(null, 404); //codigo 204 correspodnde a not found
    }

}
