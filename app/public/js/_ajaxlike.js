$(function () {
    //iタグを取得し代入
    let like = $('.like_button');
    //「like_button」というクラスを持つタグがクリックされたときに以下の処理が走る
    like.on('click', function () {
        //表示しているデータのIDと状態、押下し他ボタンの情報を取得
        text_id = $(this).attr("text_id");
        like_product = $(this).attr("like_product");
        click_button = $(this);
        var url = '/detail/' + text_id;

        //ajax処理スタート
        //サーバに送信するリクエストの設定
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  //基本的にはデフォルトでOK
            },
            url: url,  //route.phpで指定したコントローラーのメソッドURLを指定
            type: 'POST',   //GETかPOSTメソットを選択
            data: { 'text_id': text_id, 'like_product': like_product, }, //コントローラーに送るに名称をつけてデータを指定
        })   
        
        //正常にコントローラーの処理が完了した場合
        .done(function (data)
        //コントローラーからのリターンされた値をdataとして指定
        {             
            if( date == 0)
            {
                //クリックしたタグのステータスを変更
                click_button.attr("like_product", "1");
            }
            if ( data == 1 )
            {
                //クリックしたタグのステータスを変更
                click_button.attr("like_product", "0");
            }
        })
        ////正常に処理が完了しなかった場合
        .fail(function (data)
        {
            alert('いいね処理失敗');
            alert(JSON.stringify(data));
        });
    })
});
