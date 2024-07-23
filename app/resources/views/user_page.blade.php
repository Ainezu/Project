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
    </div>
</div>
<div class='post-list'>
    <div class='list'>
        <div class='post-date'>
            @foreach($text_date as $text_dates)
            <table class='pic'>                    
                <tr>
                    <td class='box-4' rowspan="2">
                        <img class='all-pic' src="{{ asset('storage/'.$text_dates['image']) }}" alt="Photo">
                    </td>
                    <td class='date'>{{ $text_dates['title'] }}</td>
                </tr>
                <tr>
                    <td class='date'>{{ $text_dates['created_at'] }}</td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>
</div>