<?php
session_start();

ini_set('display_errors', 1);
require('./db_connect.php');
// require('./function.php');

if (!empty($_POST)) { //まだ何も入力していない状態
    //エラーチェック
    if ($_POST['name'] === '') { //
        $error['name'] = 'blank';
    }
    if (strlen($_POST['pass']) < 4) {
        $error['password'] = 'length';
    }
    if (!ctype_alnum($_POST['pass'])) {
        $error['password'] = 'zenkaku';
    }
    if ($_POST['pass'] === '') {
        $error['password'] = 'blank';
    }

    if (empty($error)) { //エラーという変数がなければ

        if ($_POST['name'] !== '' && $_POST['pass'] !== '') {
            $login = $db->prepare('SELECT * FROM menbers WHERE name=? AND password=?');
            $login->execute(array(
                $_POST['name'],
                sha1($_POST['pass']),
            ));
            $menber = $login->fetch();

            if ($menber) {
                $_SESSION['name'] = $menber['name'];
                header('Location: ../index.php');
                exit();
            } else {
                $error['login'] = 'failed';
            }





            // header('Location: ../index.php');
            // exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/new_menber.css" />
    <title>新規登録</title>
</head>

<body>
    <h1>新規登録</h1>
    <form action="" method="post">

        <div class="form_box">
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="" placeholder="ニックネームを入力" maxlength="10">

            <?php if ($error['name'] === 'blank') : ?>
                <p class="error">*ニックネームを入力してください</p>
            <?php endif; ?>
        </div>

        <div class="form_box">
            <label for="pass">パスワード</label>
            <input type="password" id="pass" name="pass" value="" placeholder="半角英数字4文字以上">

            <?php if ($error['password'] === 'length') : ?>
                <p class="error">*パスワードは数字4文字で入力してください</p>
            <?php endif; ?>

            <?php if ($error['password'] === 'zenkaku') : ?>
                <p class="error">*パスワードは半角英数字で入力してください</p>
            <?php endif; ?>

            <?php if ($error['password'] === 'blank') : ?>
                <p class="error">*パスワードを入力してください</p>
            <?php endif; ?>

            <?php if ($error['login'] === 'failed') : ?>
                <p class="error">*パスワードかニックネームがまちがえています</p>
            <?php endif; ?>
        </div>

        <input type="submit" value="ログインする" class="form_btn" />

        <p><a href="../index.php">戻る</a></p>

    </form>
</body>

</html>