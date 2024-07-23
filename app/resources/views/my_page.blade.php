@include('header')

<div class='user-date'>
    <div class='icon'>

    </div>
    <div class='word-date'>
        <div class='username'>
            <a>ユーザー名: {{ $user_date['name'] }}</a>
        </div>
        <div class='totalpost'>
            <a>公開投稿数: {{ $text_count }}</a>
        </div>
        <div class='likesnumber'>
            <a>お気に入り: {{ $like_count }}</a>
        </div>        
    </div>
    <div class='yourself'>
        <div class='edit'>
            <button type="button" class="btn btn-info">ユーザー情報編集</button>
        </div>
        <div class='post-transition'>
            <button type="button" class="btn btn-success">投稿</button>
        </div>
    </div>
</div>
<div class='post-list'>
    <div class='left'>
        <button type='button' class='back'>←</button>
    </div>
    <div class='list'>
        <div class="post-date">
        <div class='serch-container'>
            @foreach($text_date as $text_dates)
            <table class='pic'>                    
                <tr>
                    <td class='box-4' rowspan="3">
                        <img src="{{ asset('storage/'.$text_dates['image']) }}" alt="Photo">
                    </td>
                    <td class='date'>{{ $text_dates['title'] }}</td>
                </tr>
                <tr>
                    <td class='date'>{{ $text_dates['created_at'] }}</td>
                </tr>
                <tr>
                    <td class='date'>{{ $text_dates['open'] }}</td>
                </tr>
            </table>
            @endforeach
        </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="button" class="btn btn-warning">削除</button>
                </div>
            </form>
    <div class='right'>
        <button type='button' class='advance'>→</button>
    </div>
</div>
<div class='page'>
    <a><<ページ数>></a>
</div>

