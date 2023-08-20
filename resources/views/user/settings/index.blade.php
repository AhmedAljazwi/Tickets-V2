@extends('master')

@section('title', 'الإعدادات')

@section('content')
    <div class="container mt-5">

        <div class="container mt-5">
            @if(session('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                الإعدادات
            </div>
            <div class="card-body">
                <form action="{{url('/settings-store')}}" method="post">
                    @csrf
                    <input class="form-control mb-2" value="{{$user->name}}" type="text" name="name" placeholder="الإسم">
                    <input class="form-control mb-2" value="{{$user->email}}" type="email" name="email" placeholder="البريد الإلكتروني">
                    <input class="form-control mb-2" value="{{$user->phone}}" type="text" name="phone" placeholder="رقم الهاتف">
                    <input class="form-control mb-2" type="text" name="password" placeholder="كلمة المرور">
                    <select class="form-control mb-2" name="city_id">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($city->id == $user->city_id) selected @endif>{{$city->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                </form>
            </div>
        </div>
    </div>
@endsection