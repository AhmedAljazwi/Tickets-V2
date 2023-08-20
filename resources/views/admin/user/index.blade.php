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
                      <a class="btn btn-success my-1" href="{{url('/edit-event/'.$user->id)}}">تعديل</a>
                      <a class="btn btn-danger" href="{{url('/delete-event/'.$user->id)}}">حذف</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection