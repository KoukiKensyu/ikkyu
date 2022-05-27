@extends('layouts.app')

@section('content')
<style>
.main{
    text-align: center;
}
.menu input:first-of-type{
    margin-right: 1200px;
}
.modal-body{
    margin: 16px auto;
    text-align: center;
    display: block;
}
.form-check-input{
    text-align: left;
    display: inline-block;
}
</style>
<div class="main">
<br>
<h2 class="display-6">管理メニュー</h2>
<br>
<br>
<br>
<!-- <button class="bot1" onclick="location.href='/admin/Memindex'">会員管理</button> 
<button  class= "bot2" onclick="location.href='/hotel_views/hotelManagement'" >宿管理</button>-->
<div class="menu">
<button type="button" class="btn btn-glow btn-outline-primary btn-rounded active btn-lg col-2" data-mdb-ripple-color="dark" onclick="location.href='/admin/user_index'">会員管理</button>
<button type="button" class="btn btn-outline-primary btn-rounded active btn-lg col-2" data-mdb-ripple-color="dark" onclick="location.href='/hotel_views/index'">宿管理</button>
</div>
</div> 
@endsection