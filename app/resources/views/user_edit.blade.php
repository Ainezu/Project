@include('header')
<div class="user-edit">
  <div class="text-center">
    <h2>ユーザー情報の確認・変更</h2>
    <div class="message-alert">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
        <form action="" method="POST">
          @csrf
          <div class="view-text">
            <label class="input-name" for="name">ユーザー名</label>
            <input class="change" type="text" id="name" name="name" value="{{ $user_date['name'] }}" />
          </div>
          <div class="view-text">
            <label class="input-name" for="email">メールアドレス</label>
            <input class="change" type="text" id="email" name="email" value="{{ $user_date['email'] }}" />
          </div>
          

          <div class="view-text">
            <button type="submit" class="btn btn-primary">変更する</button>
          </div>
        </form>

        <div class="view-text">
        <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
      </div>
      </div>
  </div>
</div>