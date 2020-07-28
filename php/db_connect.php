<?php
try {
    $db = new PDO('mysql:host=mysql10028.xserver.jp;dbname=xs884918_tokuppee;charset=utf8', 'xs884918_toku', 'UsCbjK7FBKjesg.');
} catch (PDOException $e) {
    print('DB接続エラー:' . $e->getMessage());
}
