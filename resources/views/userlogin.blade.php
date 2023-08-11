<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーログイン画面</title>
</head>
<body>
    <h1>ログイン画面</h1>
    <form action="" method="POST">
        @csrf
        ユーザー名<input type="text" name="username" value=""><br>
        パスワード<input type="password" name="password" value=""><br>
        <input type="submit" name="login" value="ログイン">
</form>
    <a href="./toroku">新規登録</a>
</body>
</html>