@extends('layouts.app')

@section('content')
<button onclick="location.href='/mypage/index'">戻る</button>
<form class="needs-validation" action="{{route('mypage.edit_confirmation', $user->id)}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <table class="table">
    <tr>
        <th><label for="validationCustom01" class="form-label">氏名：</label></th>
        <td><input class="form-control" id="validationCustom01" type="text" name="name" value="{{old('name',$user->name)}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom02" class="form-label">住所：</label></th>
        <td><input class="form-control" id="validationCustom02" type="text" name="address" value="{{old('address',$user->address)}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom03" class="form-label">電話番号：</label></th>
        <td><input class="form-control" id="validationCustom03" type="tel" name="tel" value="{{old('tel',$user->tel)}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom04" class="form-label">メールアドレス：</label></th>
        <td><input class="form-control" id="validationCustom04" type="text" name="email" value="{{old('email',$user->email)}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom05" class="form-label">生年月日：</label></th>
        <td><input class="form-control" id="validationCustom05" type="date" name="birthday" value="{{old('birthday',$user->birthday)}}" required></td>
    </tr>
    <!--
    <tr><th>変更前のパスワード：</th><td><input type="password" name="password" value=""></td></tr>
    <tr><th>変更後のパスワード：</th><td><input type="password" name="password_new" value=""></td></tr>
    <tr><th>確認用のパスワード：</th><td><input type="password" name="password_confirmation" value=""></td></tr>
    -->
    <button class="btn" type="submit">変更</button>
</form>
@endsection