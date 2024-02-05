
<x-layout>


<a href="{{ route('index.posts')}}" class="re">戻る</a>

    {{--
      投稿の内容を表示している {{ $post }} には、PostControllerから渡された$post変数の値が出力されます。
      この場合は、投稿のタイトルやテキストなどが表示されることになります。
    --}}
            <h1>
                <span>{{ $post->title }}</span>   <!-- 投稿のタイトルを表示します。 -->
                <a href="{{ route('edit.posts', $post->id) }}">編集</a>  <!-- 'route' ヘルパー関数を使用して、名前付きルート 'edit.posts' へのURLを生成し、そのURLをアンカータグのhref属性として設定しています。"編集"テキストのリンクをクリックすると、渡されたルートにリダイレクトします。 -->

                <form action="{{ route('destroy.posts',$post->id) }}"method="post">
                     <!-- 'form'タグで、フォームを開始します。'action'属性には、フォームデータを送信するURLを指定します。ここでは、'route('destroy.posts',$post->id)'で投稿を削除するためのルート（URL）を生成しています。'method'属性には、HTTPメソッド（ここでは'post'）を指定します。 -->
                    @method('DELETE')
                     <!-- HTTPメソッドを上書きします。ここでは、'DELETE'メソッドを指定しています。 -->
                    @csrf

                    <button>削除</button>
                </form>
            </h1>
            <p>{{ $post->detail }}</p>  <!-- 投稿の詳細を表示します。 -->

</x-layout>

