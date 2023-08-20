@extends('master')

@section('title', 'الصفحة الرئيسية')

@section('content')
    @if(sizeof($events) == 0)
    <div class="container">
        <div class="card">
            <div class="card-body">
                لا يوجد أحداث متوفرة حالياً
            </div>
        </div>
    </div>
    @else
    @foreach($events as $event)
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    {{$event->name}}
                </div>
    
                <div class="card-body">
                    <div class="mb-2">
                        <span class="fw-bold">العنوان:</span> {{$event->location}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">السعر:</span> {{$event->price}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">التاريخ:</span> {{$event->date}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">الساعة:</span> {{$event->time}}
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">المدينة:</span> {{$event->city->name}}
                    </div>
                    
                    <a href="{{url('/show-event/'.$event->id)}}" class="btn btn-success mt-1">حجز</a>
                </div>
            </div>
        </div>
    @endforeach
    @endif
@endsection