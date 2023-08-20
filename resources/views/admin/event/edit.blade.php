@extends('admin.master')

@section('title', 'حدث جديد')

@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div class="mb-2">{{$error}}</div>
                @endforeach
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                حدث جديد
            </div>

            <div class="card-body">
                <form action="{{url('/update-event/'.$event->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input class="form-control" type="text" name="name" value="{{$event->name}}" placeholder="إسم الحدث">
                    <input class="form-control mt-3" type="text" name="personName" value="{{$event->person_name}}" placeholder="إسم صاحب الحدث">
                    <input class="form-control mt-3" type="text" name="phone" value="{{$event->phone}}" placeholder="رقم الهاتف">
                    <input class="form-control mt-3" type="text" name="location" value="{{$event->location}}" placeholder="العنوان">
                    <input class="form-control mt-3" type="text" name="code" value="{{$event->code}}" placeholder="الرمز">
                    <input class="form-control mt-3" type="text" name="price" value="{{$event->price}}" placeholder="السعر">
                    <input class="form-control mt-3" type="date" name="date" value="{{$event->date}}" placeholder="التاريخ">
                    <input class="form-control mt-3" type="time" name="time" value="{{$event->time}}" placeholder="الوقت">
                    <input class="form-control mt-3" type="text" name="quantity" value="{{$event->quantity}}" placeholder="الكمية">
                    <select class="mt-3 form-control" name="cityId">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($city->id == $event->city_id) selected @endif>{{$city->name}}</option>
                        @endforeach
                    </select>

                    <select class="mt-3 form-control" name="typeId">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-success mt-3">حفظ التعديلات</button>
                </form>
            </div>
        </div>
    </div>
@endsection