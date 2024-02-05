<?php

// App\Http\Controllers 名前空間の指定。
// これによりこのファイルがコントローラーに関連していることがわかります。
namespace App\Http\Controllers;


// Illuminate\Http\Request クラスをインポート。
// Laravel のリクエスト（HTTPリクエスト）を取り扱うためのクラスです。
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
// Controller 基底クラスを継承した PostController クラス。 親クラスがcontroller
// MVCのControllerに相当する部分で、アプリケーションのロジックを司ります。
class PostController extends Controller
{

     // indexメソッド。これはルーティングで指定されたアクションの一つとして機能します。
    // インデックスページにアクセスがあった際に呼ばれ、postsビューを返します。
    public function index(){
        $posts = Post::latest()->get();
           // 'index' ビューを返し、ビューに 'posts' 変数を渡しています。
        return view('index')->with(['posts' => $posts]);
    }

       // textメソッド。投稿のテキスト内容を表示するページ用のメソッドです。
    // $id パラメータを受け取り、そのIDに応じた投稿内容をビューに渡す。
    public function text($id){ //textメソッドを定義
        $post = Post::findOrfail($id);// 'Post::findOrfail($id)'は、指定したIDの投稿を取得するEloquentクエリを表しています。投稿が存在しない場合は、404エラーページを表示します。


        return view('posts.text')->with(['post' => $post]);// 'view'関数を使用して、'posts.text'ビューを返しています。また、'with'メソッドを使用して、ビューに'post'変数を渡しています。これにより、ビュー内で'post'変数を使用して投稿データを表示することができます。
    }

    public function create(){ // 'create'メソッドを定義しています。これは、新規投稿作成ページを表示するためのメソッドです。
        return view('posts.create');// 'view'関数を使用して、'posts.create'ビューを返しています。これは、新規投稿作成ページを表示します。
    }

    //store の関数を定義
    //新しいPostオブジェクトを作成し、その詳細をDBに保存する役割
    public function store(PostRequest $request){
        $post = new Post(); //Postクラスのインスタンス作成
        $post->title = $request->title;//ユーザーから送信されたリクエストからtitleとdetailを取得し、$postに代入
        $post->detail = $request->detail;
        $post->save(); //PostオブジェクトをDBに保存

        return redirect()->route('index.posts');//index.Postにリダイレクト   ※index.postではエラーになり、リダイレクトされなかったが、postsにするとリダイレクトされる！？
    }

    public function edit($id){ //'edit'メソッドを定義しています。これは、投稿の編集ページを表示するためのメソッド。'$id'パラメータを受け取り、そのIDに応じた投稿内容をビューに渡します。
        $post = Post::findOrfail($id);

         // 'posts.text' ビューを返し、特定のIDに対応する 'post' 変数を持たせます。
        // $this->posts[$id] で、指定されたIDの投稿を$posts配列から取得しています。
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, $id){// 'update'メソッドを定義しています。これは、既存の投稿を更新するためのメソッドです。'PostRequest $request'パラメータは、更新のリクエストデータを受け取ります。'PostRequest'は、投稿のリクエストデータのバリデーションを行うためのクラスです。'$id'パラメータを受け取り、そのIDに応じた投稿を更新します。
        $post = Post::findOrfail($id);// 'Post::findOrfail($id)'は、指定したIDの投稿を取得するEloquentクエリを表しています。投稿が存在しない場合は、404エラーページを表示します。
        $post->title = $request->title;// ユーザーから送信されたリクエストから'title'と'detail'を取得し、'$post'に代入します。これにより、投稿のタイトルと詳細が更新されます。
        $post->detail = $request->detail;
        $post->save();// '$post->save()'は、'$post'オブジェクト（投稿データ）をデータベースに保存します。これにより、更新した投稿データがデータベースに保存されます。


        return redirect()->route('text.posts',$post->id);// 'redirect()->route('text.posts',$post->id)'は、'text.posts'ルート（投稿詳細ページ）にリダイレクトします。'$post->id'は、更新した投稿のIDを指定します。これにより、投稿を更新した後、自動的にその投稿の詳細ページに遷移します。
    }

    public function destroy($id){ // 'destroy'メソッドを定義しています。これは、既存の投稿を削除するためのメソッドです。'$id'パラメータを受け取り、そのIDに応じた投稿を削除します。
        $post = Post::findOrfail($id); // 'Post::findOrfail($id)'は、指定したIDの投稿を取得するEloquentクエリを表しています。投稿が存在しない場合は、404エラーページを表示します。
        $post->delete(); // '$post->delete()'は、'$post'オブジェクト（投稿データ）をデータベースから削除します。

        return redirect()->route('index.posts'); // 'redirect()->route('index.posts')は、'index.posts'ルート（投稿一覧ページ）にリダイレクトします。これにより、投稿を削除した後、自動的に投稿一覧ページに遷移します。
    }

    
    //ここからsearch追加
    public function search(Request $request){ // 'search'メソッドを定義しています。これは、投稿を検索するためのメソッドです。'Request $request'パラメータは、検索のリクエストデータを受け取ります。
        $posts = null; // '$posts'変数をnullで初期化します。これは、検索結果を格納するための変数です。
        $query = $request->input('title'); // 'title'フィールドから検索クエリを取得します
        if($query) { // 検索クエリが存在する場合、以下の処理を行います。
            $posts = Post::where('title', 'LIKE', "%{$query}%")->get();// 'Post::where('title', 'LIKE', "%{$query}%")->get()'は、タイトルに検索クエリを含む投稿を取得するEloquentクエリを表しています。
        }

        return view('posts.search')->with(['posts' => $posts, 'query' => $query]);// 'view'関数を使用して、'posts.search'ビューを返しています。また、'with'メソッドを使用して、ビューに'posts'変数と'query'変数を渡しています。これにより、ビュー内で'posts'変数と'query'変数を使用して検索結果を表示することができます。

    }

}
