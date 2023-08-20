@extends('master')

@section('title', 'بيانات الحدث')

@section('content')
@if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div class="mb-2">{{$error}}</div>
                @endforeach
            </div>
        @endif

        <div class="container mt-5">
            @if(session('failed'))
              <div class="alert alert-danger">
                {{session('failed')}}
              </div>
            @endif
        </div>
        
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
            </div>
        </div>

        <form action="{{url('/reserve/'.$event->id)}}" method="post">
            @csrf
            <input class="form-control mt-3" type="text" name="quantity" placeholder="عدد التذاكر">
            <button type="submit" class="btn btn-success mt-2">حجز</button>
        </form>

    </div>
@endsection