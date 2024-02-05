<x-layout> <!-- LaravelのBladeコンポーネントを使用してレイアウトを適用します -->

    <h1>
        <span>Hello Laravel!</span>
        <a href="{{ route('create.posts') }}">新規追加</a> <!--  'create.posts' に-->
       <div class= "search" >
        <a href="{{ route('search.posts') }}">検索</a> <!-- 'search.posts' ルートに -->
       </div>
    </h1>
            <ul>

                @foreach ($posts as $post) <!-- $posts配列の各要素（$post）に対してループを実行 -->
                     <li>
                       <a href="{{ route('text.posts', $post->id)}}"> <!-- 各投稿のタイトルをリンクとして表示し、 'text.posts' に。リンクは各投稿のIDをパラメータとして使用 -->
                       {{ $post->title }}</a> <!-- 投稿のタイトルを表示 -->
                    </li>
                @endforeach <!-- ループ終了 -->

            </ul>
</x-layout> <!-- レイアウト終了 -->
