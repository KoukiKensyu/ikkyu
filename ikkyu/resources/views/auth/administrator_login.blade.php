@extends('layouts.app')

@section('content')
<body>
  <div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form id="sign_in_adm" method="POST" action="{{ route('administrator.login.submit') }}">
                {{ csrf_field() }}
              <h1>管理者ログイン</h1>
              <div>
                <p>管理者ID</p>
                <input type="text" name="name" class="form-control" placeholder="ID" value="{{ old('name') }}" required autofocus>
              </div>
              @if ($errors->has('name'))
              <span ><strong>{{ $errors->first('name') }}</strong></span>
              @endif
              <br>
              <div >
                <p>パスワード</p>
                <input type="password" name="password" class="form-control" required>
              </div>
              <br>
              <div >
                <button type="submit" class="btn btn-primary">ログイン</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</body>
@endsection