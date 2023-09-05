@extends('admin.master')

@section('title', 'شحن الرصيد')

@section('content')
@if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div class="mb-2">{{$error}}</div>
                @endforeach
            </div>
        @endif

    <div class="container">
        <div class="card">
            <div class="card-header">
                شحن المحفظة
            </div>
            <div class="card-body">
                <form action="{{url('/recharge-wallet/'.$id)}}" method="post">
                    @csrf
                    <input name="amount" type="text" class="form-control" placeholder="القيمة">
                    <button class="btn btn-success" type="submit">شحن</button>
                </form>
            </div>
        </div>
    </div>
@endsection