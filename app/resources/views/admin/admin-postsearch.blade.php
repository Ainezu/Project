@include('header')
<div class="text-center">
    <h1>管理者専用</h1>

    <form class='search' action="{{ route('post.search') }}" method="post">
        @csrf
            <label class= 'user-search'>
                投稿検索
            </label>
            @if(empty($search_word))
                <input type='text' class='search-word' name='word'/>
            @else
                <input type='text' class='search-word' name='word' value="{{ $search_word }}"/>
            @endif
            <button type='submit' class='btn btn-primary'>検索</button>
    </form>
    <div class='left'>
        <button type='button' class='back' onclick="history.back()">戻る</button>
    </div>
    @if(isset($result))
        <h2>検索結果</h2>
        <table>
            <tr class="titletr">
                <th class="postth">投稿id</th>
                <th class="postth">投稿者</th>
                <th class="postth">タイトル</th>
                <th class="postth">投稿日</th>
                <th class="postth">公開情報</th>
            </tr>

            @foreach($result as $results)
            <tr>
                <th class="postth">{{ $results['id'] }}</th>
                <th class="postth">{{ $results['user_name'] }}</th>
                <th class="postth">{{ $results['title'] }}</th> 
                <th class="postth">{{ $results['created_at']->format('Y/m/d') }}</th>
                @if($results['open'] == 0)
                    <th class="postth">非公開</th>
                @else
                    <th class="postth">公開</th>
                @endif 
            </tr>
            @endforeach    
        </table>
    @endif
</div>