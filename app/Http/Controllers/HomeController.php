<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index() {
        $events = Event::where('date' , '>', Today())->get();
        return view('index', compact('events'));
    }
}
