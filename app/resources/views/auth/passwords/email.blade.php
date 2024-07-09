@include('header')
<div class="email-container">
    <div class="text-center">
          <h1>パスワード再発行</h1>
          <div class="panel-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
              @csrf
              <div class="view-text">
                <label for="email">メールアドレス</label>
                <input type="text" id="email" name="email" />
              </div>
              <div class="view-text">
                <button type="submit" class="btn btn-primary">再発行リンクを送る</button>
              </div>
            </form>
          </div>
    </div>
  </div>