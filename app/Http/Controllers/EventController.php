<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\City;
use App\Models\Type;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function create() {
        $cities = City::all();
        $types = Type::all();
        return view('admin.event.create', compact('cities', 'types'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'personName' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'code' => 'required',
            'price' => 'required',
            'date' => 'required',
            'time' => 'required',
            'cityId' => 'required',
            'typeId' => 'required',
            'quantity' => 'required',
        ]);

        $event = new Event;
        $event->name = $request['name'];
        $event->person_name = $request['personName'];
        $event->phone = $request['phone'];
        $event->location = $request['location'];
        $event->code = $request['code'];
        $event->price = $request['price'];
        $event->date = $request['date'];
        $event->time = $request['time'];
        $event->city_id = $request['cityId'];
        $event->type_id = $request['typeId'];
        $event->quantity = $request['quantity'];
        $event->save();

        return redirect('/events')->with('success', 'تم الحفظ بنجاح');
    }

    public function edit($id) {
        $event = Event::find($id);
        $cities = City::all();
        $types = Type::all();
        return view('admin.event.edit', compact('event', 'cities', 'types'));
    }
    
    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'personName' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'code' => 'required',
            'price' => 'required',
            'date' => 'required',
            'time' => 'required',
            'cityId' => 'required',
            'typeId' => 'required',
            'quantity' => 'required',
        ]);

        $event = Event::find($id);
        $event->name = $request['name'];
        $event->person_name = $request['personName'];
        $event->phone = $request['phone'];
        $event->location = $request['location'];
        $event->code = $request['code'];
        $event->price = $request['price'];
        $event->date = $request['date'];
        $event->time = $request['time'];
        $event->city_id = $request['cityId'];
        $event->type_id = $request['typeId'];
        $event->quantity = $request['quantity'];
        $event->save();

        return redirect('/events')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id) {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with('success', 'تم الحذف بنجاح');
    }
}
