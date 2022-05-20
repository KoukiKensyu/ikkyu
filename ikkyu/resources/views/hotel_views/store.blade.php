@extends('layouts.app')

@section('content')
<h2>新規登録</h2>
<table border='1'>
    <tbody>
        <tr>
        <td>宿名</td>
        <td><input type="text"></td>
        </tr>
        <tr>
        <td>住所</td>
        <td><input type="text"></td>
        </tr>
        <tr>
        <td>宿分類</td>
        <td><select name="hotelType" >
            <option value="0">0:シティホテル</option>
            <option value="1">1:リゾートホテル</option>
            <option value="2">2:ビジネスホテル</option>
            <option value="3">3:旅館</option>
            <option value="4">4:民宿</option>
            <option value="5">5:ペンション</option>
        </select></td>
        </tr>
        <tr>
        <tr>
        <td>チェックイン/チェックアウト</td>
        <td><input type="time">/<input type="time"></td>
        </tr>
        <tr>
        <td>金額/部屋</td>
        <td><input type="text">円/部屋</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td><input type="number">部屋</td>
        </tr>
    </tbody>
</table>
<button onclick="location.href='/hotel_views/storeConfirmation'">登録</button>
<button onclick="location.href='/hotel_views/hotelManagement'">戻る</button>
@endsection