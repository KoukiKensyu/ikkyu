@extends('layouts.header')

@section('content')
<h2>会員管理</h2>
    <form action=""></form>
    <input type="text">
    <input type="text">
    <button type="submit">検索</button>
    <br>
    <table class="AdminMem" border="1">
    <tr>
        <thead>
        <th>会員ID</th>
        <th>氏名</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="/admin/UserIndex">0123456789</a></td>
            <td>栗山浩一</td>
        </tr>
        <tr>
            <td><a href="/admin/UserIndex">0000000000</a></td>
            <td>いいい</td>
        </tr>
    </tbody>
    </table>


@endsection