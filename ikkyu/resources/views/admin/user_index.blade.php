@extends('layouts.app')

@section('content')

<div class="text-center">
<h2>会員管理</h2>

<form action="{{route('admin.user_index')}}">
    <input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード">
    <input type="text" name="id" value="{{request('id')}}" placeholder="検索ID">
    <button type="submit" class="p-2 bd-highlight btn btn-outline-primary btn-rounded active h-50" >検索</button></form>
    <br>
</div>

    <div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
        <div class="card" style="width: 40rem;"> <!--tableをcard化--> 
    <table border="1" class="table table-hover" >
    <tr>
        <thead>
        <th>会員ID</th>
        <th>氏名</th>
    </thead>
    </tr>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><a href="/admin/user_detail/{{$user ->id}}">{{$user ->id}}</a></td>
            <td>{{$user ->name}}</td></label>
        </tr>
    @endforeach
    </tbody>
    </table>

   <p> {{ $users->appends(Request::all())->links() }}</p>
</div></div>
@endsection