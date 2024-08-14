@include('header')
<div class='postedit-container'>
    <div class='postedit-left'>
        <button type='button' class='back' onclick="history.back()">戻る</button>
    </div>
    <div class='browsing-container'>
        <img class='view' src="{{ asset('storage/' . $result['image']) }}">
    </div>
    <form action="" method="POST">
    @csrf
        <div class='edit-information'>
            <label class='title'>タイトル  :<input type="text" name="title" class='post-title' value="{{ $result['title'] }}"></label>
            <label class='comment'>投稿者コメント</label>
            <textarea name="comment" class="view-comment">{{ $result['comment'] }}</textarea>
            <label class='open-edit'>公開情報
                @if($result['open']==1)
                <label>
                    <input type="radio" name="open" value="1" checked>
                    公開
                </label>
                <label>
                    <input type="radio" name="open" value="0">
                    非公開
                </label>
                @else
                <label>
                    <input type="radio" name="open" value="1">
                    公開
                </label>
                <label>
                    <input type="radio" name="open" value="0" checked>
                    非公開
                </label>
                @endif
            </lavel>
        </div>
</div>
        <div class="edit_overwrite">
            <button type="submit" class="btn btn-primary">変更する</button>
        </div>
    </form>


