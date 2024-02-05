<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{url('css/style.css')}}">
        <title>掲示板</title>
    </head>
    <body>
        <div class="container">

           {{ $slot }}
          <!-- Bladeテンプレートのスロット（挿入ポイント）を表示します。ここには、別のBladeテンプレートから渡されたコンテンツが表示されます。 -->

        </div>
    </body>
</html>
