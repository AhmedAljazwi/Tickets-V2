@extends('admin.master')

@section('title', 'المحفظة')

@section('content')
<div class="container mt-5">
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
  </div>

  <div class="container mt-5 mx-5">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">إسم المستخدم</th>
              <th scope="col">البريد الإلكتروني</th>
              <th scope="col">رقم الهاتف</th>
              <th scope="col">الرصيد</th>
              <th scope="col">عمليات</th>
            </tr>
          </thead>
          <tbody>
            @foreach($wallets as $wallet)
              <tr>
                  <td>{{$wallet->id}}</td>
                  <td>{{$wallet->user->name}}</td>
                  <td>{{$wallet->user->email}}</td>
                  <td>{{$wallet->user->phone}}</td>
                  <td>{{$wallet->balance}}</td>
                  <td>
                    <a href="{{url('/recharge-wallet/'.$wallet->id)}}" class="btn btn-success">شحن رصيد</a>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
  </div>
@endsection