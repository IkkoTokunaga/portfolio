<?php
session_start();

if (!isset($_SESSION['join'])) {
	header('Location: info.php');
	exit();
}

if (!empty($_POST)) {

	mb_language("Japanese");
    mb_internal_encoding("UTF-8");
	  $myaddress = 'tokuppee1515@gmail.com';
	  $name = $_POST['join']['name'];
      if(mb_send_mail($myaddress, $name . "様からお問合せが届きました", $_POST['join']['email'] . '**********' . $_POST['join']['textare'])){
		unset($_SESSION['join']);
	
		header('Location: thanks.html');
		exit();
      } else {
        echo "メールの送信に失敗しました";
      };
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body{margin-left: 20px;} 
        dd{margin-bottom: 20px;}
        input[type='submit']{
            width: 100px;
            font-size: 16px;
        }
    </style>

	<title>お問い合わせ</title>

	<link rel="stylesheet" href="../style.css" />
</head>

<body>
		<div id="head">
			<h1>内容を確認して下さい</h1>
		</div>

		
			<p>記入した内容を確認して、「送信する」ボタンをクリックしてください</p>
			<form action="" method="post">
				<input type="hidden" name="action" value="submit" />
				<dl>
					<dt>名前</dt>
					<dd>
						<?php print(htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES));
						?>

                    </dd>
                    <dt>連絡先</dt>
					<dd>
						<?php print(htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES));
						?>

					</dd>
					<dt>お問い合わせ内容</dt>
					<dd>
                    <?php print(htmlspecialchars($_SESSION['join']['textarea'], ENT_QUOTES));?>
					</dd>
				</dl>
				<div><a href="info.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="button" value="送信する" /></div>
			</form>
	

	</div>
</body>

</html>