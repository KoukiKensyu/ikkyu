@extends('layouts.app')

@section('content')
<h2>会員管理</h2>
    <form action="{{route('admin.user_index')}}">
    <input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード">
    <input type="text" name="id" value="{{request('id')}}" placeholder="検索ID">
    <button type="submit">検索</button></form>
    <br>
    <table class="AdminMem" border="1">
    <tr>
        <thead>
        <th>会員ID</th>
        <th>氏名</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><a href="/admin/user_detail/{{$user ->id}}">{{$user ->id}}</a></td>
            <td>{{$user ->name}}</td>
        </tr>
    @endforeach
    </tbody>
    </table>

   <p> {{ $users->appends(Request::all())->links() }}</p>
@endsection