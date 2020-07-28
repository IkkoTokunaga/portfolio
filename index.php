<?php
session_start();
ini_set('display_errors', 1);
require('php/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("insert into poll (answer, created) values (:answer, now())");
    $stmt->bindValue(':answer', $_POST['answer'], PDO::PARAM_INT);
    $stmt->execute();


    header('Location: php/result.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8" />
    <meta charset="UTF-8" />
  <meta name="twitter:card" content="summary_large_image" /> 
<meta name="twitter:site" content="@tokuppee15" /> 
<meta property="og:url" content="http://xs884918.xsrv.jp/tokuppeeportfolio" /> 
<meta property="og:title" content="tokuppeeportfolio" /> 
<meta property="og:description" content="徳永一行のポートフォリオです" /> 
<meta property="og:image" content="http://xs884918.xsrv.jp/tokuppeeportfolio/images/portfolio_tokuppee.png" /> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Tokuppee_Portfolio</title>
</head>

<body>
    <header>
        <div class="header_inner">
            <h1>IKKΘtΘKUNAGA</h1>
            <nav>
                <ul class="main_menu">
                    <li><a href="#profile">profile</a></li>
                    <li><a href="#skills">skills</a></li>
                    <li><a href="#my_works">my_works</a></li>
                    <li><a href="#contact">contact</a></li>
                </ul>
            </nav>
        </div>

        <div class="sub_h1"><a href="#">I.T</a></div>
        <div class="sub_menu">
            <img src="./images/icon_menu.png" alt="" />
        </div>

        <nav class="hg_menu hide">
            <div class="close_btn hide">
                <img src="./images/close_icon.png" alt="" />
            </div>
            <ul>
                <li><a href="#" class="hg_menu_a">top</a></li>
                <li><a href="#profile" class="hg_menu_a">profile</a></li>
                <li><a href="#skills" class="hg_menu_a">skills</a></li>
                <li><a href="#my_works" class="hg_menu_a">my_works</a></li>
                <li><a href="#contact" class="hg_menu_a">contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="main_visual inner">
            <h3>I.T</h3>
            <div class="btns">
                <a href="php/new_menber.php">
                    <div class="btn btn_new_menber">
                        新規登録
                    </div>
                </a>
                <a href="php/login.php">
                    <div class="btn btn_login">IN</div>
                </a>
                <a href="php/logout.php">
                    <div class="btn btn_login">OUT</div>
                </a>
            </div>
        </div>
    </main>
    <section id="profile">
        <h2>Profile</h2>
        <div class="profile_inner inner">
            <div class="profile_img">
                <img src="images/profile_image.jpg" alt="" />
            </div>
            <div class="profile_container">
                <h4>
                    <?php if (isset($_SESSION['name'])) : ?>
                        <?php echo $_SESSION['name'] . 'さん、'; ?>
                    <?php else : ?>
                        <?php echo 'ゲストさん'; ?>
                    <?php endif;  ?>

                    こんにちは！</h4>
                <p class="profile_text">
                    アクセス頂き、誠にありがとうございます。<br />
                    私は広島県広島市出身、33歳、徳永一行と申します。
                    現在子育てをしながら、工場の作業員として働き、密かに志していたWEBエンジニアへのキャリアチェンジを現実のモノとするべく令和1年11月より今現在まで学習を継続してまいりました。<br />
                    私の尊敬する方から頂いた言葉
                    【知覚動考】インプットしたら、アウトプットしながら考えろ！<br />
                    この言葉を胸に刻み続け、成功を成功と思わず
                    生涯、学びとともに励んでまいります。
                </p>
            </div>
        </div>
    </section>

    <section id="skills">
        <h2>Skills</h2>
        <div class="skills_inner inner">
            <ul class="skills_ul">
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/file_type_html_icon_130541.png" alt="" />
                    </div>
                    <div class="skill_name">HTML</div>
                    <p class="skills_text">
                        適切なタグを使用してHTMLを書くことができます。
                    </p>
                </li>
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/file_type_css_icon_130661.png" alt="" />
                    </div>
                    <div class="skill_name">CSS</div>

                    <p class="skills_text">
                        CSSを用いて、レイアウトをくんだり、HTMLを装飾することができます。
                    </p>
                </li>
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/sass_icon_130835.png" alt="" />
                    </div>
                    <div class="skill_name">SASS</div>

                    <p class="skills_text">
                        SASSを用いて、より効率的なCSSを書くことができます。
                    </p>
                </li>
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/jQuery_icon-icons.com_68967.png" alt="" />
                    </div>
                    <div class="skill_name">jQuery</div>

                    <p class="skills_text">
                        jQueryを使い動的なサイトを作ることができます。
                    </p>
                </li>
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/javascript_icon_130900.png" alt="" />
                    </div>
                    <div class="skill_name">javascript</div>
                    <p class="skills_text">
                        javascriptを使い動的なサイトを作ることができます。
                    </p>
                </li>
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/php_icon_130857.png" alt="" />
                    </div>
                    <div class="skill_name">PHP</div>
                    <p class="skills_text">
                        PHPを使い簡単なシステムを作ることができます。データベースと連動させ、CRUDシステムを実装できます。
                    </p>
                </li>
                <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/mysqlworkbench_93532.png" alt="" />
                    </div>
                    <div class="skill_name">MySQL</div>
                    <p class="skills_text">
                        MySQLを使いデータベースを操作することができます。
                    </p>
                </li>
                <!-- <li class="skills_li fadein">
                    <div class="skills_image">
                        <img src="./images/laravel.svg" alt="" />
                    </div>
                    <div class="skill_name">laravel</div>
                    <p class="skills_text">
                        猛勉強中です！
                    </p>
                </li> -->
            </ul>
        </div>
    </section>

    <section id="my_works">
        <div class="deg_box"></div>
        <h2>My Works</h2>
        <div class="inner">
            <div class="my_works_container">
                <div class="my_works_image my_works_image01">
                </div>
                <div class="my_works_box">
                    <p>
                        デイトラ2nd課題<br />
                        制作期間2週間
                    </p>
                </div>
            </div>
            <div class="my_works_container">
                <div class="my_works_image my_works_image02">
                </div>
                <div class="my_works_box">
                    <p>
                        デイトラ2nd最終課題<br />
                        制作期間2週間
                    </p>
                </div>
            </div>
            <div class="my_works_container">
                <div class="my_works_image my_works_image03">
                </div>
                <div class="my_works_box">
                    <p>
                        dental clinic模写<br />
                        制作期間1週間
                    </p>
                </div>
            </div>
            <div class="my_works_container">
                <div class="my_works_image my_works_image04">
                </div>
                <div class="my_works_box">
                    <p>
                        クリノート<br />
                        制作期間2週間
                    </p>
                </div>
            </div>
            <div class="my_works_container">
                <div class="my_works_image my_works_image05">
                </div>
                <div class="my_works_box">
                    <p>
                        Airbnb模写<br />
                        制作期間2週間
                    </p>
                </div>
            </div>
            <div class="my_works_container">
                <div class="my_works_image my_works_image06">
                </div>
                <div class="my_works_box">
                    <p>
                        メタルアートとコラボの世界<br />
                        制作期間2週間
                    </p>
                </div>
            </div>
    </section>
    <section id="contact">
        <h2>Contact</h2>

        <div class="form_btn"> <a href="php/info.php">
                お問い合わせはこちら！</div></a>
    </section>
        <footer id="footer">
            <div class="footer_inner inner">
                <h3>アンケートにご協力おねがいします！</h3>
                <form action="" method="post">
                    <ul class="row">
                        <li class="footer_text_top">このサイトは</li>
                        <li class="box box_0" data-id="0">
                            <p>最高‼</p>
                        </li>
                        <li class="box box_1" data-id="1">
                            <p>普通‼</p>
                        </li>
                        <li class="box box_2" data-id="2">
                            <p>まだまだ‼</p>
                        </li>
                        <li class="footer_text_bottom">でした！！</li>
                    </ul>
                    <input type="hidden" name="answer" id="answer" value="">

                    <div class="footer_btn">送信</div>
                    <a href="php/result.php" class="result_btn">結果を見る</a>
                </form>
            </div>
            <div class="footer_footer">
                <div class="footer_lift">
                    <div class="twitter">
                        <a href="https://twitter.com/home?utm_source=homescreen&utm_medium=shortcut" target="_blank"><img src="./images/twitter.png" alt="" />
                            <p>twitter @tokuppee15</p>
                        </a>
                    </div>
                </div>
                <a href="#">TOP</a>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/main_jQuery.js"></script>
</body>

</html>