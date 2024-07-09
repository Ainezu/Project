    @include('header')
    <body>
        <div class='search'>
            <form class='search-form' action="{{ route('indication.search') }}" method="get">
                @csrf
                <input type='text' class='search-word' name='word'/>
                <button type='submit' class='btn btn-primary'>検索</button>
            </form> 
        </div>
        <div class='main-view'> 
            <div class='main'>
                <div class='main-container'>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                    <div class='box-1'></div>
                </div>
            </div>
            <div class='asaid'>
                <div class='word-list'>
                    <p>検索ワード</p>
                </div>
            </div>
        </div><!--class:body-->
    </body>
</html>
</div>
