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
                <form action="{{url('/store-event')}}" method="POST">
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="إسم الحدث">
                    <input class="form-control mt-3" type="text" name="personName" placeholder="إسم صاحب الحدث">
                    <input class="form-control mt-3" type="text" name="phone" placeholder="رقم الهاتف">
                    <input class="form-control mt-3" type="text" name="location" placeholder="العنوان">
                    <input class="form-control mt-3" type="text" name="code" placeholder="الرمز">
                    <input class="form-control mt-3" type="text" name="price" placeholder="السعر">
                    <input class="form-control mt-3" type="date" name="date" placeholder="التاريخ">
                    <input class="form-control mt-3" type="time" name="time" placeholder="الوقت">
                    <input class="form-control mt-3" type="text" name="quantity" placeholder="الكمية">
                    <select class="mt-3 form-control" name="cityId">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>

                    <select class="mt-3 form-control" name="typeId">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-primary mt-3">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection