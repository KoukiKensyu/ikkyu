@extends('layouts.app')

@section('content')
<h2>新規登録</h2>
<form class="needs-validation" action="{{route('hotels.postconfirm')}}" method="post">
    @csrf
    <table border='1' class="table">
        <tbody>
            <tr>
                <td><label for="validationCustom01" class="form-label">宿名</label></td>
                <td><input class="form-control" id="validationCustom01" type="text" name="name" value="{{$hotel->name}}" required></td>
            </tr>
            <tr>
                <td><label for="validationCustom02" class="form-label">住所</label></td>
                <td><input class="form-control" id="validationCustom02" type="text" name="address" value="{{$hotel->address}}" required></td>
            </tr>
            <tr>
                <td><label for="validationCustom03" class="form-label">宿分類</label></td>
                <td><select class="select-control" id="validationCustom03" name="hotel_type" required>
                <option value="0">0:シティホテル</option>
                <option value="1">1:リゾートホテル</option>
                <option value="2">2:ビジネスホテル</option>
                <option value="3">3:旅館</option>
                <option value="4">4:民宿</option>
                <option value="5">5:ペンション</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="validationCustom04" class="form-label">チェックイン/チェックアウト</label></td>
                <td><input class="form-control" id="validationCustom04" type="time" name="checkin_time" value="$hotel->checkin_time" required>
                    /
                    <input class="form-control" id="validationCustom04" type="time" name="checkout_time" value="$hotel->checkout_time" required></td>
            </tr>
            <tr>
                <td><label for="validationCustom05" class="form-label">部屋数</label></td>
                <td><input class="form-control" id="validationCustom05" type="number" name="max_rooms" value="$hotel->max_rooms" min="1" required>部屋</td>
            </tr>
            <tr>
                <td><label class="form-label">コメント</label></td>
                <td><input class="form-control" type="text" name="comment"></td>
            </tr>
        </tbody>
    </table>
<div class="d-flex justify-content-end">
    <button type="submit"  class="btn btn-outline-danger" data-mdb-ripple-color="dark">登録確認へ</button></form>
    <button onclick="location.href='/hotel_views/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div>
@endsection