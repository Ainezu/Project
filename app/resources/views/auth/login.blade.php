@include('header')
<div class="login">
  <div class="text-center">
    <h1>ログイン</h1>
      <div class="message-alert">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="view-text">
            <label for="email">メールアドレス</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="view-text">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" />
          </div>
          <div class="view-text">
            <button type="submit" class="btn btn-primary">送信</button>
          </div>
        </form>
      </div>
      <div class="view-text">
        <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
      </div>
    </div>  
  </div>
</div>