@extends('admin.master')

@section('title', 'الأحداث')

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
                <th scope="col">صلاحية الأحداث</th>
                <th scope="col">صلاحية المستخدمين</th>
                <th scope="col">عمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                      @if($user->event_persmission == 0)
                        <a href="{{url('/event-state/'.$user->id)}}" class="btn btn-success my-1">تفعيل</a>
                      @else
                        <a href="{{url('/event-state/'.$user->id)}}" class="btn btn-danger my-1">تعطيل</a>
                      @endif
                    </td>
                    <td>
                      @if($user->users_permission == 0)
                        <a href="{{url('/users-state/'.$user->id)}}" class="btn btn-success my-1">تفعيل</a>
                      @else
                        <a href="{{url('/users-state/'.$user->id)}}" class="btn btn-danger my-1">تعطيل</a>
                      @endif
                    </td>
                    <td>
                      @if($user->is_active)
                        <a class="btn btn-danger my-1" href="{{url('/disable-account/'.$user->id)}}">تعطيل</a>
                      @elseif(!$user->is_active)
                        <a class="btn btn-success my-1" href="{{url('/activate-account/'.$user->id)}}">تفعيل</a>
                      @endif
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection