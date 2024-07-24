@include('header')
<div class="text-center">
    <h1>管理者専用</h1>

    <form class='search' action="{{ route('admin.result') }}" method="post">
        @csrf
            <label class= 'user-search'>
                <input type="radio" name="search" value="1" checked>
                ユーザー検索
            </label>
            <label class= 'post-search'>
                <input type="radio" name="search" value="2">
                投稿検索
            </label>
            <input type='text' class='search-word' name='word'/>
            <button type='submit' class='btn btn-primary'>検索</button>
    </form>
    @if(session('message'))
	<div class="error_message">
		{{ session('message') }}
	</div>
    @else
        @if(session('search') == 1)
            <h2>ユーザー検索結果</h2>
        @else
            <h2>投稿検索結果</h2>
        @endif
        @if(empty(sessioon('result')))

            <table>
                <tr>
                    @if(session('search') === '1')
                        <th>ユーザーid</th>
                        <th>ユーザー名</th>
                        <th>公開投稿数</th>
                        <th>お気に入り数</th>
                    @else
                        <th>投稿id</th>
                        <th>ユーザー名</th>
                        <th>タイトル</th>
                        <th>投稿日時</th>
                        <th>公開情報</th>
                    @endif
                </tr>
                <tr>
                @if(session('search') === '1')
                        <th>{{ session('result') }}</th>
                        <th>{{ session('result'['name']) }}</th>
                        <th>{{ session('result'['id']) }}</th>
                        <th>{{ session('result'['open_count']) }}</th>
                    @else
                        <th>{{ session('result'['id']) }}</th>
                        <th>{{ session('user_date'['name']) }}</th>
                        <th>{{ session('result'['title']) }}</th>
                        <th>{{ session('result'['created_at']) }}</th>
                        <th>{{ session('result'['open']) }}</th>
                    @endif
            </table>
        @endif
    @endif
</div>