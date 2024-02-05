
<x-layout>
  <a href="{{ route('text.posts', $post->id)}}" class="re">戻る</a> <!-- 'route('text.posts', $post->id)'は、投稿詳細ページへのルート（URL）を生成します。これにより、「戻る」リンクをクリックすると投稿詳細ページに遷移します。 -->
  <h1>編集</h1>
  <form action="{{ route('update.posts', $post->id) }}" method="post">   <!-- 'form'タグで、フォームを開始します。'action'属性には、フォームデータを送信するURLを指定します。ここでは、'route('update.posts', $post->id)'で投稿を更新するためのルート（URL）を生成しています。'method'属性には、HTTPメソッド（ここでは'post'）を指定します。 -->
    @csrf
    @method('PATCH')

    <label>
       Title
       <input type="text" name="title" value="{{ old('title', $post->title) }}">
    </label>
    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror
    <label>
        Detail
        <textarea name="detail"  rows="10">{{old('detail',$post->detail) }}</textarea>
    </label>
     @error('detail')
         <div class="error">{{ $message }}</div>
     @enderror
     <div class="btn"><button>新規追加</button></div>
   </form>


 </x-layout>

