@include('header')
<div class="reset">
  <div class="text-center">
    <h1>パスワード再発行</h1>
    <div class="panel-body">
      <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="view-text">
          <label class="input-name" for="email">メールアドレス</label>
          <input type="text" id="email" name="email" />
        </div>
        <div class="view-text">
          <label class="input-name" for="password">新しいパスワード</label>
          <input type="password" id="password" name="password" />
        </div>
        <div class="view-text">
          <label class="input-name" for="password-confirm">新しいパスワード（確認）</label>
          <input type="password" id="password-confirm" name="password_confirmation" />
        </div>
        <div class="view-text">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </div>  
</div>