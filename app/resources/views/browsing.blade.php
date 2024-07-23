@include('header')

<div class='edit-container'>
    <div class='left'>
        <button type='button' class='back' onclick="history.back()">戻る</button>
    </div>
    <div class='browsing-container'>
        <!--いいね処理-->
        <div class='favorite-container'>
                @if($like_product == 0)
                    <a class="like_button" name="favolite" text_id="{{ $result['id'] }}" like_product="0">
                        お気に入り
                        <i class="fas fa-heart fa-lg like-toggle"></i>
                    </a>
                @else
                    <a class="like_button" name="favolite" text_id="{{ $result['id'] }}" like_product="1">
                        お気に入りから外す
                        <i class="fas fa-heart fa-lg like-toggle"></i>
                    </a>
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
    </div>
</div>
