@include('header')
<div class="register">
    <div class="text-center">
          <h1>会員登録</h1>
          <div class="message-alert">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="view-text">
                <label class="input-name" for="name">ユーザー名</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="view-text">
                <label class="input-name" for="email">メールアドレス</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="view-text">
                <label class="input-name" for="password">パスワード</label>
                <input type="password" id="password" name="password">
              </div>
              <div class="view-text">
                <label fclass="input-name" or="password-confirm">パスワード（確認）</label>
                <input type="password" id="password-confirm" name="password_confirmation">
              </div>
              <div class="view-text">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>