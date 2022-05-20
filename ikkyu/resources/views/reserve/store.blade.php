@extends('layouts.header')

@section('content')
<h2>予約内容入力</h2>
<table border='1'>
    <tbody>
        <tr>
        <td>宿名</td>
        <td>宿1</td>
        </tr>
        <tr>
        <td>氏名</td>
        <td><input type="text" placeholder="自動入力"></td>
        </tr> 
        <tr>
        <td>予約部屋数</td>
        <td><select name="roomNumber" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>部屋</td>
        </tr>
        <tr>
        <td>日程</td>
        <td><input type="date">～<input type="date"></td>
        </tr> 
        <tr>
        <td>合計金額</td>
        <td>$$$$$円</td>
        </tr>
        
    </tbody>
</table>
<button onclick="location.href='check'">確認画面へ</button>
<button onclick="location.href='show'">戻る</button>
@endsection