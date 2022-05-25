@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>会員情報変更</h2>
</div>

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化--> 

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
</form>
<button onclick="location.href='/admin/user_detail/{{ $user->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div></div></div>
@endsection