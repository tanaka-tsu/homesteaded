<!-- コントローラー -->
<?php


// "Illuminate\Support\Facades\Route" と
// "App\Http\Controllers\PostController" を使用することを宣言しています。
// これによって、Laravelのルーティング機能と、PostControllerクラスが使用できるようになります。
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




Route::get('/', [PostController::class,'index'])
    ->name('index.posts');


// GETリクエストの '/posts/{id}' URLにアクセスがあった時に PostController の text メソッドを呼び出します。
// {id} はURLの一部として動的なパラメータを表し、投稿のIDとして機能します。
// このルートには 'text.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::get('/posts/{id}', [PostController::class,'text'])
    ->name('text.posts')
    ->where('id','[0-9]+');

// GETリクエストの '/posts/create' URLにアクセスがあった時に PostController の create メソッドを呼び出します。
// このルートには 'create.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::get('/posts/create', [PostController::class,'create'])
->name('create.posts');

// POSTリクエストの '/posts/store' URLにアクセスがあった時に PostController の store メソッドを呼び出します。
// このルートには 'store.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::post('/posts/store', [PostController::class,'store'])
->name('store.posts');

// GETリクエストの '/posts/{id}/edit' URLにアクセスがあった時に PostController の edit メソッドを呼び出します。
// このルートには 'edit.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::get('/posts/{id}/edit', [PostController::class,'edit'])
    ->name('edit.posts')
    ->where('id','[0-9]+');

// PATCHリクエストの '/posts/{id}/update' URLにアクセスがあった時に PostController の update メソッドを呼び出します。
// このルートには 'update.posts' という名前が付いており、リンク作成などで便利に使用できます。
 Route::patch('/posts/{id}/update', [PostController::class,'update'])
    ->name('update.posts')
    ->where('id','[0-9]+');

// DELETEリクエストの '/posts/{id}/destroy' URLにアクセスがあった時に PostController の destroy メソッドを呼び出します。
// このルートには 'destroy.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::delete('/posts/{id}/destroy', [PostController::class,'destroy'])
    ->name('destroy.posts')
    ->where('id','[0-9]+');



    
//ここからsearch追加

// GETリクエストの '/posts/search' URLにアクセスがあった時に PostController の search メソッドを呼び出します。
// このルートには 'search.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::get('/posts/search', [PostController::class,'search'])
    ->name('search.posts');

 // POSTリクエストの '/posts/search' URLにアクセスがあった時に PostController の search メソッドを呼び出します。
// このルートには 'search.posts' という名前が付いており、リンク作成などで便利に使用できます。
Route::post('/posts/search', [PostController::class,'search'])->name('search.posts');
