@include('header')
<div class="text-center">
    <h1>管理者専用</h1>

    <form class='search' action="{{ route('user.search') }}" method="post">
        @csrf
            <label class= 'user-search'>
                ユーザー検索
            </label>
            @if(empty($search_word))
                <input type='text' class='search-word' name='word'/>
            @else
                <input type='text' class='search-word' name='word' value="{{ $search_word }}"/>
            @endif
            <button type='submit' class='btn btn-primary'>検索</button>
    <div class='adminback'>
        <button type='button' class='back' onclick="{{ url('/') }}">戻る</button>
    </div>
        </form>
    @if(isset($result))
        <h2>検索結果</h2>
        <table>
            <tr class="titletr">
                <th class="postth">ユーザーid</th>
                <th class="postth">ユーザー名</th>
                <th class="postth">投稿数</th>
                <th class="postth">公開投稿数</th>
                <th class="postth">お気に入り数</th>
            </tr>

            @foreach($result as $results)
            <tr>
                <th class="postth">{{ $results['id'] }}</th>
                <th class="postth">{{ $results['name'] }}</th>
                <th class="postth">{{ $results['text_count'] }}</th>
                <th class="postth">{{ $results['open_count'] }}</th>
                <th class="postth">{{ $results['like_count'] }}</th> 
            </tr>
            @endforeach 
        </table>
    @endif
</div>