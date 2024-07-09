@include('header')

<div class='edit-container'>
    <div class='left'>
        <button type='button' class='back' onclick="history.back()">戻る</button>
    </div>
    <div class='browsing-container'>
        <div class='view'></div>
    </div>
    <div class='information'>
        <div class='username'>
            <a>   投稿者名  :</a>
            <a href="{{ route('userdate.edit') }}">ユーザーネーム</a>
        </div>
        <div class='title'>
            <a>   タイトル  :</a>
        </div>
        <div class='comment'>
            <a>投稿者コメント:</a>
        </div>
    </div>
</div>
