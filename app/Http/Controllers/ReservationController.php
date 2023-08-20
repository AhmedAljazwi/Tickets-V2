<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function show($id) {
        $event = Event::find($id);
        return view('user.event.show', compact('event'));
    }

    public function reserve(Request $request, $id) {
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        $eventQuantity = Event::find($id);
        $quantity = $eventQuantity->quantity; //number of tickets of event
        $reservationTickets = Ticket::where('event_id', $id)->get()->sum('quantity');

        if($quantity - $reservationTickets <= $request['quantity']) {
            return redirect('/show-event/'.$id)->with('failed', 'عدد التذاكر الذي طلبته غير متوفر، و عدد التذاكر المتوفر هو'.$quantity-$reservationTickets);
        }

        $ticket = new Ticket;
        $ticket->event_id = $id;
        $ticket->user_id = Auth::user()->id;
        $ticket->quantity = $request['quantity'];
        $ticket->date = Today();
        $ticket->time = Now();
        $ticket->save();

        return redirect('/');
    }

    public function showReservations() {
        $reservations = Ticket::where('user_id', Auth::user()->id)->get();
        return view('user.event.show-reservations', compact('reservations'));
    }
}
