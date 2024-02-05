{{-- 新規追加ページ --}}
<x-layout>
  <a href="{{ route('index.posts')}}" class="re">戻る</a>
  <h1>新規追加</h1>
  <form action="{{ route('store.posts')}}" method="post">  <!-- 'route('store.posts')'で新規投稿を保存するためのルート（URL）を生成しています。'method'属性には、HTTPメソッド（ここでは'post'）を指定します。 -->
    @csrf

    <label>
       Title
       <input type="text" name="title" value="{{old('title') }}">   <!-- 'input'タグで、テキスト入力フィールドを作成します。'name'属性には、フィールド名（ここでは'title'）を指定します。'value'属性には、フィールドの初期値を指定します。前回の入力値を表示しています。 -->
    </label>
    @error('title')  <!--バリデーションエラーメッセージを表示します。'title'は、バリデーションエラーをチェックするフィールド名を指定します。 -->
        <div class="error">{{ $message }}</div> <!-- '{{ $message }}'で、バリデーションエラーメッセージを表示します。 -->
    @enderror
    <label>
        Detail
        <textarea name="detail"  rows="10">{{old('detail') }}</textarea>  <!-- 'textarea'タグで、テキストエリアを作成します。'name'属性には、フィールド名（ここでは'detail'）を指定します。前回の入力値を表示しています。 -->
    </label>
     @error('detail')   <!-- バリデーションエラーメッセージを表示します。'detail'は、バリデーションエラーをチェックするフィールド名を指定します。 -->
         <div class="error">{{ $message }}</div> <!-- '{{ $message }}'で、バリデーションエラーメッセージを表示します。 -->
     @enderror
     <div class="btn"><button>新規追加</button></div>
   </form>


 </x-layout>

