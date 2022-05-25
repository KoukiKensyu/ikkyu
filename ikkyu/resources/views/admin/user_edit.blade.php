@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>会員情報変更</h2>
</div>

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化--> 

<<<<<<< HEAD
<form action="{{route('admin.user_edit_confirm', $user->id)}}" method="POST">
@csrf
<input type="hidden" name="id" value="{{$user->id}}">

<table border="1" class="table">
<tr><th colspan="2" class="table-dark">会員情報</th></tr>
<tr><th>氏名：</th><td><input type="text" name="name" value="{{$user->name}}"></td></tr>
<tr><th>住所：</th><td><input type="text" name="address" value="{{$user->address}}"></td></tr>
<tr><th>電話番号：</th><td><input type="tel" name="tel" value="{{$user->tel}}"></td></tr>
<tr><th>メールアドレス：</th><td><input type="text" name="email" value="{{$user->email}}"></td></tr>
<tr><th>生年月日：</th><td><input type="date" name="birthday" value="{{$user->birthday}}"></td></tr>
</table>
<div class="d-flex justify-content-end"> 
   
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">変更確認へ</button>
=======
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
>>>>>>> bec4e986b29126791cd244c53af263602204f229
</form>
<button onclick="location.href='/admin/user_detail/{{ $user->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div></div></div>
@endsection