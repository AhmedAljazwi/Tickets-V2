@extends('master')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="container mt-5">

        <div class="container mt-5">
            @if(session('failed'))
              <div class="alert alert-danger">
                {{session('failed')}}
              </div>
            @endif
        </div>
        
        <div class="card">
            <div class="card-header">
                تسجيل الدخول
            </div>
            <div class="card-body">
                <form action="{{url('/check')}}" method="post">
                    @csrf
                    <input class="form-control mb-2" type="text" name="email" placeholder="البريد الإلكتروني">
                    <input class="form-control mb-2" type="password" name="password" placeholder="كلمة المرور">
                    <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </div>
@endsection