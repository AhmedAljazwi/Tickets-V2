@extends('master')

@section('title', 'الحجوزات الخاصة بي')

@section('content')
    @if(sizeof($reservations) == 0)
    <div class="container">
        <div class="card">
            <div class="card-body">
                لا يوجد لديك تذاكر محجوزة
            </div>
        </div>
    </div>
    @else
    @foreach($reservations as $reservation)
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    {{$reservation->event->name}}
                </div>
    
                <div class="card-body">
                    <div class="mb-2">
                        <span class="fw-bold">العنوان:</span> {{$reservation->event->location}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">السعر:</span> {{$reservation->event->price}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">التاريخ:</span> {{$reservation->event->date}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">الساعة:</span> {{$reservation->event->time}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">المدينة:</span> {{$reservation->event->city->name}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
@endsection