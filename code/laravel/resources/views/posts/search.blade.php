<x-layout>
    <a href="{{ route('index.posts')}}" class="re">戻る</a>
    <h1>検索画面</h1>
    <form action="{{ route('search.posts') }}" method="post">  <!-- 'form'タグで、フォームを開始します。'action'属性には、フォームデータを送信するURLを指定します。ここでは、'route('search.posts')'で検索結果ページへのルート（URL）を生成しています。'method'属性には、HTTPメソッド（ここでは'post'）を指定します。 -->
      @csrf  <!-- '@csrf'は、CSRF（クロスサイトリクエストフォージェリ）トークンを生成します。これは、Laravelが提供するセキュリティ機能の一つで、不正なリクエストを防ぐために使用されます。 -->

      <label>

         Title
         <input type="text" name="title" value="{{ $query  }}">   <!-- 'input'タグで、テキスト入力フィールドを作成します。'name'属性には、フィールド名（ここでは'title'）を指定します。'value'属性には、フィールドの初期値を指定します。ここでは、'{{ $query }}'で検索クエリを表示しています。 -->
      </label>


       <div class="btn_search"><button >検索</button></div>
     </form>
    <div class="search_span"><span>検索結果</span></div>

    @if($query && $posts)       <!-- 条件分岐を開始します。'$query'と'$posts'が存在する場合、以下の処理を行います。 -->
    <ul>
        @foreach ($posts as $post)  <!-- 配列の各要素に対して処理を行います。'$posts'配列の各要素を'$post'として取り出します。 -->
            <li>
                <a href="{{ route('text.posts', $post->id) }}">{{ $post->title }}</a>   <!-- 'a'タグで、リンクを作成します。'href'属性には、リンク先のURLを指定します。ここでは、'route('text.posts', $post->id)'で投稿詳細ページへのルート（URL）を生成しています。'{{ $post->title }}'で、投稿のタイトルを表示します。 -->
            </li>
        @endforeach
    </ul>
@endif




   </x-layout>
