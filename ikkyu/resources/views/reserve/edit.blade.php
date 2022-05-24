@extends('layouts.app')

@section('content')
<h2>予約内容入力</h2>

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
                <td><input class="form-control" id="validationCustom02" type="text" name="name" value="" required></td>
            </tr> 
            <tr>
                <td><label for="validationCustom03" class="form-label">予約部屋数</label></td>
                <td><select class="form-select" id="validationCustom03" name="rooms" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>部屋</td>
            </tr>
            <tr>
                <td><label for="validationCustom04" class="form-label">日程</label></td>
                <td><input class="form-control" id="validationCustom04" type="date" name="checkin_date" required>
                    ～
                    <input class="form-control" id="validationCustom04" type="date" name="checkout_date" required></td>
            </tr> 
            <tr>
                <td>合計金額</td>
                <td>$$$$$円</td>
            </tr>
            
        </tbody>
    </table>
    <input type="hidden" name="hotel_id" value="{{$hotel[0]->id}}">
    <button class="btn btn-outline-danger btn-rounded active" type="submit">確認画面へ</button>
</form>
    <button class="btn btn-outline-info btn-rounded active" onclick="location.href='/reserve/show/{{$hotel[0]->id}}'">戻る</button>
@endsection