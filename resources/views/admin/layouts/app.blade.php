<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <div class="header_1">
            <a href="{{ route('curriculum_list') }}">授業管理</a>
            <a href="{{ route('curriculum_edit') }}">お知らせ管理</a>
            <a href="{{ route('banner_edit') }}">バナー管理</a>
        </div>
        <div class="header_2">
            <a href="{{ route('login') }}">ログアウト</a>
        </div>
    </header>
        <a href='javascript:history.back()' class="back" >←戻る</a>
@yield('content')
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
