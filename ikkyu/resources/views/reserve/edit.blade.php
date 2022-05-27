@extends('layouts.app')

@section('content')
<h2>予約内容入力</h2>
@include('commons/flash')
<?php $today = \Carbon\Carbon::now()->format("Y-m-d");?>
<form class="needs-validation" action="{{route('reserve.check')}}" method="post">
    @csrf
    <table class="table">
        <tbody>
            <tr>
                <td><label for="validationCustom01" class="form-label">宿名</label></td>
                <td>{{$hotel[0]->name}}</td>
            </tr>
            <tr>
                <td><label for="validationCustom02" class="form-label">氏名</label></td>
                <td><input class="form-control" id="validationCustom02" type="text" name="name" value="{{ Auth::user()->name }}" required></td>
            </tr> 
            <tr>
                <td><label for="validationCustom03" class="form-label">予約部屋数</label></td>
                <td><select class="form-select" id="validationCustom03" name="rooms" required>
                    @for($i=1; $i <= $data; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                   @endfor
                </select>部屋</td>
            </tr>
            <tr>
                <td><label for="validationCustom04" class="form-label">日程</label></td>
                <td><input class="form-control" min="{{$today}}" id="validationCustom04" type="date" name="checkin_date" value="{{$checkin}}" required>
                    ～
                    <input class="form-control" min="{{$today}}" id="validationCustom04" type="date" name="checkout_date" value="{{$checkout}}" required></td>
            </tr> 
            <tr>
                <td>金額{{$data}}</td>
                <td>{{$hotel[0]->price}}円/部屋</td>
            </tr>
            
        </tbody>
    </table>
    <input type="hidden" name="hotel_id" value="{{$hotel[0]->id}}">
    <input type="hidden" name="data" value="{{$data}}">
    <div class="text-right">
            <button class="btn btn-outline-danger btn-rounded active" type="submit">確認画面へ</button>
</form>
            <button class="btn btn-outline-info btn-rounded active" onclick="location.href='/reserve/show/{{$hotel[0]->id}}.php?aaa={{$data}}'">戻る</button>
    </div>
@endsection