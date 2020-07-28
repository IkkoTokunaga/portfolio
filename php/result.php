<?php
session_start();

ini_set('display_errors', 1);
require('./db_connect.php');

$results = array_fill(0, 3, 0);

foreach ($db->query("select answer, count(id) as c from poll group by answer") as $row) {
    $results[$row['answer']] = (int) $row['c'];
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>result</title>
    <link rel="stylesheet" href="../css/result.css">
</head>

<body>
    <h1 class="result_h1">回答ありがとうございました！！</h1>
    <form action="" method="post">
        <div class="result_row">
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <div class="result_box" id="box_<?= $i; ?>"><?= $results[$i]; ?>票</div>
            <?php endfor; ?>


        </div>
        <a href="../index.php">戻る</a>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
      $(function () {

        function BoxWidth(box) {
          var pollCount = $(box).text().slice(0, -1)*10;
          var w = 300 + Number(pollCount);
          $(box).css("width", w);
        }

        BoxWidth("#box_0");
        BoxWidth("#box_1");
        BoxWidth("#box_2");

      });
    </script>

</body>

</html>