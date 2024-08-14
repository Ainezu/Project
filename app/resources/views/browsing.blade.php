@include('header')

<div class='edit-container'>
    <div class='left'>
        <button type='button' class='back' onclick="history.back()">戻る</button>
    </div>
    <div class='browsing-container'>
        <!--いいね処理-->
        <div class='favorite-container'>
            @if(Auth::check())
                @if($like_product == 0) 
                    <input type="button" class="like_button" name="favolite" text_id="{{ $result['id'] }}" like_product="0"
                        value="お気に入り">
                    </input>
                @else
                    <input type="button" class="like_button" id="unlike" name="favolite" text_id="{{ $result['id'] }}" like_product="1"
                        value="お気に入りから外す">
                    </input>
                @endif
            @endif
        </div>     
        <img class='view' src="{{ asset('storage/' . $result['image']) }}">
    </div>
    <div class='information'>
        <label class='username'>
            投稿者名  :
                @if(Auth::id() === $result['user_id'] )
                    <a href="{{ route('mydate.edit',['user_id' => $result['user_id']]) }}" >{{ $user_name['name'] }}</a>
                @else
                    <a href="{{ route('userdate.edit',['user_id' => $result['user_id']]) }}">{{ $user_name['name'] }}</a> 
                @endif
        </label>
        <label class='title'>
               タイトル  : {{ $result['title'] }}
        </label>
        <label class='comment'>投稿者コメント</label>
        <div class='view-comment'>
            {{ $result['comment'] }}
        </div>

        @if(Auth::id() === $result['user_id'] )
        <div class='controll'>
            <div class='editbtn'>
                <form class ='post-editbtn' action="{{ route('post.edit',['id' => $result['id']]) }}" method="get">
                @csrf
                    <button type="submit" class="btn btn-info">編集</button>
                </form>
            </div>
            <div class ='deletebtn'>
                <form class ='post-deletebtn' action="{{ route('post.delete',['id' => $result['id']]) }}" method="get">
                @csrf
                    <button type="submit" class="btn btn-warning">削除</button>
                </form>
            </div>         
        </div>
        @endif
    </div>
</div>
