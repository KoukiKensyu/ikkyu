@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>会員情報変更</h2>
</div>
@include('commons/flash')

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化--> 

<form class="needs-validation" action="{{route('admin.user_edit_confirm', $user->id)}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <table class="table">
    <tr><th colspan="2">会員情報</th></tr>
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
        <td><input class="form-control" id="validationCustom04" type="email" name="email" value="{{$user->email}}" required></td>
    </tr>
    <tr>
        <th><label for="validationCustom05" class="form-label">生年月日：</label></th>
        <td><input class="form-control" id="validationCustom05" type="date" name="birthday" value="{{$user->birthday}}" required></td>
    </tr>
    </table>
    <div class="d-flex justify-content-end">    
    <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">変更確認画面へ</button>
</form>
<button type="button" onclick="location.href='/admin/user_detail/{{ $user->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div></div></div></div>
@endsection