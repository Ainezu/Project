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
        <div class='editbtn'>
            <form class ='date-editbtn' action="{{ route('date.edit', ['id' => $user_date['id'] ]) }}" method="get">
            @csrf
                <button type="submit" class="btn btn-info">ユーザー編集</button>
            </form>    
        </div>
        <div class='deletebtn'>
            <form class = 'date-delete' action="{{ route('date.delete', ['id' => $user_date['id'] ]) }}" method="get">
                <button type="submit" class="btn btn-warning">ユーザー削除</button>
            </form>
        </div>

        <div class='post-transitionbtn'>
            <form class='post-formbtn' action="{{ route('postform.edit') }}" method="get">
            @csrf          
                <button type='submit' class="btn btn-success">投稿</button>
            </form>
        </div>
    </div>
</div>
<div class='post-list'>
    <div class='list'>
        <div class="post-date">
            <div class='serch-container'>
                @foreach($text_date as $text_dates)
                <table class='user_pic'>                    
                    <tr class='user_tr'>
                        <td class='box-4' rowspan="3">
                            <img class='all-pic' src="{{ asset('storage/'.$text_dates['image']) }}" alt="Photo">
                        </td>
                        <td class='date'>
                            <a href ="{{ route('browsing.detail',['id' => $text_dates['id']]) }}">{{ $text_dates['title'] }}</a>
                        </td>
                    </tr>
                    <tr class='user_tr'>
                        <td class='date'>{{ $text_dates['created_at'] }}</td>
                    </tr>
                    <tr class='user_tr'>
                    @if($text_dates['open'] == 0)
                        <td class='date'>非公開</td>
                    @else
                        <td class='date'>公開</td>
                    @endif 
                    </tr>
                </table>
                @endforeach
            </div>
        </div>
    </div>
</div>

