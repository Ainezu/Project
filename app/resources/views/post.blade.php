@include('header')
@if(session('message'))
	<div class="error_message">
		{{ session('message') }}
	</div>
@endif
@if(session('imgerror'))
	<div class="error_message">
		{{ session('imgerror') }}
	</div>
@endif
@if(session('titleerror'))
	<div class="error_message">
		{{ session('titleerror') }}
	</div>
@endif
<form class="report" method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
    @csrf
    <table>
        <tr>
            <td class="subject">投稿写真</td>     
            <td class="right-subject"><input name="image_file" id="image_file" type="file" value="{{ old('image_file') }}"></td>
        <tr>
        <tr>
            <td class="subject">タイトル</td>
            <td class="right-subject"><input type="text" name="title" value="{{ old('title') }}"><td>
        </tr>
        <tr>
            <td class="subject">公開情報</td>
            <td class="right-subject">
                <div class=radio-button>
                    <label>
                        <input type="radio" name="open" value="1" checked>
                        公開
                    </label>
                    <label>
                        <input type="radio" name="open" value="2">
                        非公開
                    </label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="subject">コメント</td>
            <td class="comment-subject"><textarea name="comment" class="post-comment" value="{{ old('comment') }}"></textarea></td>
        </tr>
    </table>
    <div class="post-submit">
        <div class="post-info">
            <input type="submit" class="btn btn-primary" value="登録する">
        </div>
    </div>    
</form>