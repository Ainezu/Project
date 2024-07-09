@include('header')

<div class='user-date'>
    <div class='icon'>

    </div>
    <div class='word-date'>
        <div class='username'>
            <a>ユーザー名:</a>
        </div>
        <div class='totalpost'>
            <a>公開投稿数:</a>
        </div>
        <!--もし、本人だったら
        @if(Auth::check())-->
        <div class='likesnumber'>
            <a>お気に入り:</a>
        </div>        
    </div>
    <div class='yourself'>
        <div class='edit'>
            <button type="button" class="btn btn-info">ユーザー情報編集</button>
        </div>
        <div class='post-transition'>
            <button type="button" class="btn btn-success">投稿</button>
        </div>
        <!--@endif-->
    </div>
</div>
<div class='post-list'>
    <div class='left'>
        <button type='button' class='back'>←</button>
    </div>
    <div class='list'>
        <div class="post-date">
            <div class='box-4'></div>
            <div class='info'>
                <div class='date'></div>
                <div class='date'></div>
                <div class='date'></div>
            </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="button" class="btn btn-warning">削除</button>
                </div>
            </div> 
        </div>
        <div class="post-date">
            <div class='box-4'></div>
            <div class='info'>
                <div class='date'></div>
                <div class='date'></div>
                <div class='date'></div>
            </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="button" class="btn btn-warning">削除</button>
                </div>
            </div>
        </div>    
        <div class="post-date">
            <div class='box-4'></div>
            <div class='info'>
                <div class='date'></div>
                <div class='date'></div>
                <div class='date'></div>
            </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="button" class="btn btn-warning">削除</button>
                </div>
            </div>
        </div>
        <div class="post-date">
            <div class='box-4'></div>
            <div class='info'>
                <div class='date'></div>
                <div class='date'></div>
                <div class='date'></div>
            </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="button" class="btn btn-warning">削除</button>
                </div>
            </div>
        </div>
        <div class="post-date">
            <div class='box-4'></div>
            <div class='info'>
                <div class='date'></div>
                <div class='date'></div>
                <div class='date'></div>
            </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="button" class="btn btn-warning">削除</button>
                </div>
            </div>
        </div>
        <div class="post-date">
            <div class='box-4'></div>
            <div class='info'>
                <div class='date'></div>
                <div class='date'></div>
                <div class='date'></div>
            </div>
            <form class='yourbutton'>
                <div class='post-edit'>
                    <button type="button" class="btn btn-info">編集</button>
                </div>
                <div class='delete'>
                    <button type="submit" class="btn btn-warning">削除</button>
                </div>
            </form>
        </div>    
    </div>
    <div class='right'>
        <button type='button' class='advance'>→</button>
    </div>
</div>
<div class='page'>
    <a><<ページ数>></a>
</div>

