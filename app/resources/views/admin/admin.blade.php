@include('header')
<div class="text-center">
    <h1>管理者専用</h1>

    <form class='search' action="{{ route('admin.choice') }}" method="post">
        @csrf
        <div class='admin-serch'>
            <button type='submit' id='user' class='btn btn-secondary' name='user'>ユーザー検索</button>
            <button type='submit' id='post' class='btn btn-secondary' name='post'>投稿検索</button>
        </div>
    </form>
</div>