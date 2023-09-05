@extends('master')

@section('title', 'تسجيل مستخدم جديد')

@section('content')
    <div class="container mt-5">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div class="mb-2">{{$error}}</div>
                @endforeach
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                مستخدم جديد
            </div>
            <div class="card-body">
                <form action="{{url('/register-store')}}" method="post">
                    @csrf
                    <input class="form-control mb-2" type="text" name="name" placeholder="الإسم">
                    <input class="form-control mb-2" type="email" name="email" placeholder="البريد الإلكتروني">
                    <input class="form-control mb-2" type="text" name="phone" placeholder="رقم الهاتف">   
                    <input class="form-control mb-2" type="password" name="password" placeholder="كلمة المرور">
                    <input class="form-control mb-2" type="date" name="birth" placeholder="تاريخ الميلاد">

                    <select class="form-control mb-2" name="city_id">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>

                    <div class="mb-2">
                        <input type="radio" name="gender_id" value="1" checked> ذكر
                        <input type="radio" name="gender_id" value="2"> أنثى
                    </div>

                    <button type="submit" class="btn btn-primary">تسجيل</button>
                </form>
            </div>
        </div>
    </div>
@endsection