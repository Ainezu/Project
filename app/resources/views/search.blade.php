@include('header')
    <div class='search'>
        <form class='search-form' action="" method="get">
            @csrf
            <input type='text' class='search-word' name='word' value='{{ $word }}'/>
            <button type='submit' class='btn btn-primary'>検索</button>
        </form> 
    </div>

    <div class='search-body'>
        <div class='serch-container'>
            @foreach($search as $searchs)
            <table class='pic'>                    
                <tr>
                    <td class='box-2'>
                        <img class="search_view" src="{{ asset('storage/'.$searchs['image']) }}" alt="Photo">
                    </td>
                </tr>
                <tr>
                    <td class='box-3'>
                        <a href="{{ route('browsing.detail',['id' => $searchs['id']]) }}">{{ $searchs['title'] }}</a>
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>