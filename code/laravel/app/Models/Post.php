<?php

namespace App\Models; // このモデルがApp\Modelsという名前空間に属していることを示します。

use Illuminate\Database\Eloquent\Factories\HasFactory; // ファクトリトレイトを使用します。これは、テストデータを生成するための機能を提供します。
use Illuminate\Database\Eloquent\Model; // Eloquentモデルクラスを継承します。これは、Laravelのデータベース操作を行うためのクラスです。

class Post extends Model // 'Post'という名前のクラスを定義し、EloquentのModelクラスを継承します。
{
    use HasFactory; // HasFactoryトレイトを使用します。これにより、このモデルに対してファクトリを使用することができます。

    protected $fillable = [ // 'fillable'プロパティは、一括代入を許可する属性を定義します。
        'title', // 'title'属性は一括代入を許可。
        'detail', // 'detail'属性も一括代入を許可。
    ]; // これら以外の属性は、一括代入から保護されます。つまり、これら以外の属性を一括で代入しようとすると、Laravelはそれを無視します。
}
