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
        <a href="{{url('/create-event')}}" class="btn btn-primary mb-3">حدث جديد</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">إسم الحدث</th>
                <th scope="col">إسم صاحب الحدث</th>
                <th scope="col">رقم الهاتف</th>
                <th scope="col">العنوان</th>
                <th scope="col">الرمز</th>
                <th scope="col">السعر</th>
                <th scope="col">التاريخ</th>
                <th scope="col">الوقت</th>
                <th scope="col">المدينة</th>
                <th scope="col">النوع</th>
                <th scope="col">الكمية</th>
                <th scope="col">عمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->person_name}}</td>
                    <td>{{$event->phone}}</td>
                    <td>{{$event->location}}</td>
                    <td>{{$event->code}}</td>
                    <td>{{$event->price}}</td>
                    <td>{{$event->date}}</td>
                    <td>{{$event->time}}</td>
                    <td>{{$event->city->name}}</td>
                    <td>{{$event->type->name}}</td>
                    <td>{{$event->quantity}}</td>
                    <td>
                      <a class="btn btn-success my-1" href="{{url('/edit-event/'.$event->id)}}">تعديل</a>
                      <a class="btn btn-danger" href="{{url('/delete-event/'.$event->id)}}">حذف</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection