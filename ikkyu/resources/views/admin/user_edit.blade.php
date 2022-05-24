@extends('layouts.app')

@section('content')

<form class="needs-validation" action="{{route('admin.user_edit_confirm', $user->id)}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <table class="table">
    <tr>
        <th><label for="validationCustom01" class="form-label">氏名：</label></th>
        <td><input class="form-control" id="validationCustom01" type="text" name="name" value="{{$user->name}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom02" class="form-label">住所：</label></th>
        <td><input class="form-control" id="validationCustom02" type="text" name="address" value="{{$user->address}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom03" class="form-label">電話番号：</label></th>
        <td><input class="form-control" id="validationCustom03" type="tel" name="tel" value="{{$user->tel}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom04" class="form-label">メールアドレス：</label></th>
        <td><input class="form-control" id="validationCustom04" type="text" name="email" value="{{$user->email}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom05" class="form-label">生年月日：</label></th>
        <td><input class="form-control" id="validationCustom05" type="date" name="birthday" value="{{$user->birthday}}" required></td>
    </tr>
    </table>    
    <button class="btn" type="submit">変更</button>
</form>
<button onclick="location.href='/admin/user_detail/{{ $user->id }}'">戻る</button>
@endsection