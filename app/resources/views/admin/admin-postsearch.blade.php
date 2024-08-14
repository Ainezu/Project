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
        <div class='adminback'>
            <button type='button' class='back' onclick="location.href='{{ url('/admin') }}'">戻る</button>
        </div>
    </form>
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
                <td class="postth">{{ $results['id'] }}</td>
                <td class="postth">{{ $results['user_name'] }}</td>
                <td class="postth">{{ $results['title'] }}</td> 
                <td class="postth">{{ $results['created_at']->format('Y/m/d') }}</td>
                @if($results['open'] == 0)
                    <td class="postth">非公開</td>
                @else
                    <td class="postth">公開</td>
                @endif 
                <td class="deletetd">
                    <form action="{{ route('post.delete', ['id'=>$results['id']]) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach    
        </table>
    @endif
</div>