
<?php
session_start();
ini_set('display_errors', 1);

if (!empty($_POST)) { //まだ何も入力していない状態
	//エラーチェック
	if ($_POST['name'] === '') { //
		$error['name'] = 'blank';
	}
	if ($_POST['email'] === '') {
		$error['email'] = 'blank';
	}
	if ($_POST['textarea'] === '') {
		$error['textarea'] = 'blank';
	}
	$fileName = $_FILES['image']['name'];
	if (!empty($fileName)) {
		$ext = substr($fileName, -3);
		if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
			$error['image'] = 'type';
		}
	}

	if (empty($error)) { //エラーという変数がなければ

		$_SESSION['join'] = $_POST;
		header('Location: check.php');
		exit();
	}
}

if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])) {
	$_POST = $_SESSION['join'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
   <div id="contact">
   <h2>お問い合わせ</h2>
<form action="" method="post" class="inner">
            <div class="form_tr">
                <label for="name">名前</label>
                <input type="text" id="name" name="name" value="<?= (htmlspecialchars($_POST['name'], ENT_QUOTES)); ?>" placeholder="名前を入力してください" />
                <?php if ($error['name'] === 'blank') : ?>
                <p class="error">*名前を入力してください</p>
                <?php endif; ?>

            </div>

            <div class="form_tr">
                <label for="email">アドレス or twitter</label>
                <input type="text" id="email" name="email" value="<?= (htmlspecialchars($_POST['email'], ENT_QUOTES)); ?>" placeholder="連絡先を入力してください" />
                <?php if ($error['email'] === 'blank') : ?>
                <p class="error">*連絡先を入力してください</p>
                <?php endif; ?>

            </div>
            <div class="form_tr">
                <label for="textarea">お問い合わせ内容</label>
                <textarea name="textarea" id="textarea" placeholder=""><?= (htmlspecialchars($_POST['textarea'], ENT_QUOTES)); ?></textarea>
            </div>
            <?php if ($error['textarea'] === 'blank') : ?>
                <p class="error">*お問い合わせ内容を入力してください</p>
                <?php endif; ?>

            <input type="submit" value="確認画面へ" />
            <p><a href="../index.php">戻る</a></p>
        </form>
   </div> 
</body>
</html>