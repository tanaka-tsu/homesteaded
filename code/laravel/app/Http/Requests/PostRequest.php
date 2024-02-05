<?php

namespace App\Http\Requests; // 'namespace'キーワードで、このクラスが属する名前空間を定義しています。ここでは、'App\Http\Requests'という名前空間に属しています。

use Illuminate\Foundation\Http\FormRequest; // 'use'キーワードで、他の名前空間のクラスを使用できるようにしています。ここでは、'Illuminate\Foundation\Http\FormRequest'クラスを使用できるようにしています。

class PostRequest extends FormRequest // 'class'キーワードで、新しいクラスを定義しています。ここでは、'PostRequest'という名前のクラスを定義しています。また、'extends'キーワードで、このクラスが'FormRequest'クラスを継承していることを示しています。
{
    public function authorize() // 'authorize'メソッドを定義しています。このメソッドは、ユーザーがこのリクエストを行う権限があるかどうかを判断します。ここでは、常に'true'を返しているため、すべてのユーザーがこのリクエストを行う権限があることを示しています。
    {
        return true;
    }

    public function rules() // 'rules'メソッドを定義しています。このメソッドは、リクエストに適用するバリデーションルールを返します。ここでは、'title'と'detail'が必須であることを示すルールを返しています。
    {
        return [
            'title' => 'required',
            'detail' => 'required',
        ];
    }

    public function messages() // 'messages'メソッドを定義しています。このメソッドは、バリデーションエラーメッセージを返します。ここでは、'title'と'detail'が必須であることを示すエラーメッセージを返しています。
    {
        return [
            'title.required' => 'タイトルは必須です',
            'detail.required' =>'詳細は必須です',
        ];
    }
}
