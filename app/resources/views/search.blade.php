@include('header')
    <div class='search'>
        <form class='search-form' action="{{ route('indication.search') }}" method="get">
            @csrf
            <input type='text' class='search-word' name='word' value='{{ $word }}'/>
            <button type='submit' class='btn btn-primary'>検索</button>
        </form> 
    </div>
    <div class='search-body'>
        <div class='left'>
            <a class='back'>⇐</a>
        </div>
        <div class='main'>
            <div class='main-container'>
                <div class='pic'>
                    <div class='box-2'>
                        <a href="{{ route('browsing.detail') }}">Photo image</a>
                    </div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
                <div class='pic'>
                    <div class='box-2'></div>
                    <div class='box-3'></div>
                </div>
            </div>
        </div>
        <div class='right'>
            <a class='advance'>⇒</a>
        </div>
    </div>
