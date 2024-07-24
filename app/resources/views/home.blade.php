    @include('header')
    <body>
        <div class='search'>
            <form class='search-form' action="{{ route('indication.search') }}" method="get">
                @csrf
                <input type='text' class='search-word' name='word'/>
                <button type='submit' class='btn btn-primary'>検索</button>
            </form>                 
            @if(Auth::check())
                <form class='post-formbtn' action="{{ route('postform.edit') }}" method="get">
                    <button type='submit' class='btn btn-success' >投稿</button>
                </form>
                @if(Auth::user()->role == 'admin')
                    <form class='post-formbtn' action="{{ route('admin.form') }}" method="get">
                        <button type='submit' class='btn btn-secondary' >管理者用</button>
                    </form>    
                @endif
            @endif
        </div>
        <div class='main-view'> 
            <div class='main-pic'>
                <img class='main' src="{{ asset('img/DSC_0265.JPG') }}" alt="花筏">
            </div>
            <div class='asaid'>
                <div class='word-list'>
                    <p>検索ワード</p>
                </div>
            </div>
        </div><!--class:main-view-->
    </body>
</html>
</div>
