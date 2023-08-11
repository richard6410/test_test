<?php

if (isset($_POST['singin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username . "<br>";
    echo $passwaord . "<br>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー新規登録画面</title>
</head>
<body>
    <h1>ユーザー新規登録画面</h1>
    <form action="" method="POST">
        @csrf
        ユーザー名<input type="text" name="username" value=""><br>
        パスワード<input type="password" name="password" value=""><br>
        <input type="submit" name="singin" value="新規登録">
</form>
</body>
</html>