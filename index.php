<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


// DB接続情報
$dbn = 'mysql:dbname=tabitoto;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // 空文字


// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

// 参照はSELECT文!
$sql = 'SELECT * FROM event_list';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// $statusにSQLの実行結果が入る(取得したデータではない点に注意)

//  データを表示しやすいようにまとめる
if ($status == false) {
    $error = $stmt->errorInfo(); // 失敗時はエラー出力
    exit('sqlError:' . $error[2]);
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll()で全部取れる! あとは配列で処理!!
    // echo '<pre>';
    // var_dump($result[0]['todo']);
    //var_dump($result);
    // echo '</pre>';
    // exit();
    $output = "";
    foreach ($result as $record) {
        $output .= "<div class='event_each'>";
        $output .= "<h1>{$record["event_name"]}</h1>";
        $output .= "<p>{$record["event_detail"]}</p><br>";
        $output .= "<p>カテゴリー:{$record["event_category"]}</p>";
        $output .= "<p>開催地:{$record["pref"]}</p>";
        $output .= "<p>{$record["city"]}</p>";
        $output .= "<p>オンライン:{$record["remote_or_not"]}</p>";
        $output .= "<p>募集人数:{$record["how_many"]}人</p>";
        $output .= "<p>所要時間:{$record["how_long"]}時間</p>";
        $output .= "<p>料金(大人):{$record["how_much_adult"]}円</p>";
        $output .= "<p>申込期限:{$record["limit_date"]}</p>";
        $output .= "<p>{$record["limit_time"]}</p>";
        $output .= "<p>最小遂行人数:{$record["min_person"]}</p>";
        $output .= "<button>この体験に申し込む</button>";
        $output .= "</div>";
    }
    //print($output);
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABITOTO</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio&display=swap" rel="stylesheet">
    <meta name="description" content=“TABITOTOは様々な人と好きで繋がる体験シェアサービスです。”>
    <meta property="og:title" content="TABITOTO">
    <link rel="apple-touch-icon" href="images/common/touch-icon.png">
    <link rel="shortcut icon" href="images/common/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </script>

</head>

<body>
    <div id="page_top"><a href="#"></a></div>

    <header>
        <div class="main_title">
            <!-- 画像はCSSで入れる -->
            <div class="main_title_text">
                <h1>みんなの好きを体験しよう</h1>
                <p>だれかの「好き」を通して見れば、いつもの日常も初めて見る景色に変わる。<br>
                    TABITOTOは様々な人と好きで繋がる体験シェアサービスです。</p>
            </div> <!-- class="main_title_text" END -->
        </div><!-- class="main_title" END -->

        <nav>
            <div class="nav_content">
                <!-- <div class="nav-logo"><img class="header_logo" src="img/original/header_logo.png" alt="TABITOTOロゴ"> -->
                <!-- </div> -->
                <div class="nav_buttom_box"></div>
                <div class="nav-item"><a href="#course">体験一覧</a></div>
                <div class="nav-item"><a href="#about">TABITOTOとは</a></div>
                <div class="nav-item"><a href="#news">ホスト一覧</a></div>
                <div class="nav-item"><a href="#contact">CONTACT</a></div>
                <div class="nav-item"><a href="#access">イベントを企画する</a></div>
            </div> <!-- class="nav_buttom_box" END -->
            </div><!-- class="nav_content" END -->
        </nav>
    </header>

    <main>
        <div class="course_top">
            <div class="course_top_text">
                <section id="course" class="section2">
                    <h2 class="yellow">体験一覧</h2>
                </section>
            </div> <!-- class="course_top_text" END -->
        </div> <!-- class="course_top" END -->

        <div class="course_ex_box">

            <div class="event_all">
                <?= $output ?>
            </div>

        </div><!-- class="course_ex_box" END -->




        <div class="about_box">
            <section id="about" class="section1">
                <div class="about_title yellow">
                    <h2>ABOUT</h2>
                </div> <!-- class="about_title" END -->
                <div class="about_subtitle">
                    <h3>みんなの好きを体験しよう</h3><br>
                </div> <!-- class="about_subtitle" END -->
                <div class="about_wrapper">
                    <div class="about_text">
                        <p><span>TABITOTOは、自分の好きなことを体験としてシェアできるサービスで、<br>体験を企画・開催する「ホスト」と参加する側である「ゲスト」を繋げます。</span>
                        </p>
                        <p>日本全国様々な地域に住むホストが企画する体験に参加することができるので、<br>近所での新しい発見や旅先での現地の人との交流、<br>また、実際に足を運ぶことが難しい遠方のホストにも出会うことができます。
                        </p>
                        <p>体験を企画するホストはだれもが無料で登録・掲載することができ、<br>すべての体験に保険が適用されるので安心して開催できます。</p>
                        <p>さあ、溢れる愛に、会いにいこう。</p>
                    </div> <!-- class="about_text" END -->
                    <div class="about_img">
                        <img src="img/family.png" alt="">
                    </div>
                </div>
            </section>

        </div><!-- class="about_box"END -->


        <div class="news_box_top">
            <div class="news_box_text">
                <section id="news" class="section3">
                    <h2 class="yellow">ホスト一覧</h2>
                    <h3>全国のホストが"好き"をシェアする体験をご用意して待っています</h3>
                    <!-- <h4>2021年4月 チーズアカデミーに新入生が入学しました！</h4> -->
                </section>
            </div> <!-- class="news_box_text" END -->
        </div><!-- class="news_box_top" END -->

        <div class="news_big">
            <div id="text-wrap">
                <div class="show-text">
                    <div class="news_item item01">
                        <div class="news_img img01"><img src="img/original/news_01.png" alt=""></div>
                        <div class="news_detail detail_01">
                            <p class="member_name">HIROYASU KODAMA</p>
                            <p class="comment">チーズアカデミー総責任者。ここから始まる、0からチーズを創り出すという挑戦を、チーズアカデミーは全力で応援します。
                                一緒にセカイを変えるチーズを創りましょう。</p>
                        </div>
                    </div>
                    <div class="news_item item02">
                        <div class="news_img img02"><img src="img/original/news_02.png" alt=""></div>
                        <div class="news_detail detail_02">
                            <p class="member_name">TARO OSUGI</p>
                            <p class="comment">チーズアカデミー福岡、主任講師。チーズアカデミー東京を卒業後、チーズの魅力にのめり込む。World Cheese Association会員。
                            </p>
                        </div>
                    </div>
                    <div class="news_item item03">
                        <div class="news_img img03"><img src="img/original/news_03.png" alt=""></div>
                        <div class="news_detail detail_03">
                            <p class="member_name">SACHI OKADA</p>
                            <p class="comment">チーズアカデミースタッフ。受講生の担任の先生。好きなおつまみはチーズ。</p>
                        </div>
                    </div>
                    <div class="news_item item04">
                        <div class="news_img img04"><img src="img/original/news_04.png" alt=""></div>
                        <div class="news_detail detail_04">
                            <p class="member_name">MASAHIKO IMAIZUMI</p>
                            <p class="comment">チーズセラピスト経験あり。数え切れないほどのチーズを食べてきた経験を生かしてチーズ起業したい。</p>
                        </div>
                    </div>
                </div> <!-- class="show-text" END -->

                <div class="hide-text">
                    <div class="hide_inside_text">


                        <div class="news_item item05">
                            <div class="news_img img05"><img src="img/original/news_05.png" alt=""></div>
                            <div class="news_detail detail_05">
                                <p class="member_name">KEIKO OTANI</p>
                                <p class="comment">チーズを餌に使用した全く新しい魚釣り技法を確立したい。子供たちのために美味しいチーズのある世界を残したい。</p>
                            </div>
                        </div>
                        <div class="news_item item06">
                            <div class="news_img img06"><img src="img/original/news_06.png" alt=""></div>
                            <div class="news_detail detail_06">
                                <p class="member_name">KYOHEI KATSUKAWA</p>
                                <p class="comment">チーズの基礎を学び、地方創生に関するチーズを構築したい。</p>
                            </div>
                        </div>
                        <div class="news_item item07">
                            <div class="news_img img07"><img src="img/original/news_07.png" alt=""></div>
                            <div class="news_detail detail_07">
                                <p class="member_name">KEIKO KAWASE</p>
                                <p class="comment">チーズの第一線を退いた人が、どんな状況でもチーズにアクセスできる社会にしたい。</p>
                            </div>
                        </div>
                        <div class="news_item item08">
                            <div class="news_img img08"><img src="img/original/news_08.png" alt=""></div>
                            <div class="news_detail detail_08">
                                <p class="member_name">DAISUKE KOISHI</p>
                                <p class="comment">デジタルデバイドのないチーズ業界の形成に寄与したい。チーズ流通の仕組み化で変革を起こしたい。</p>
                            </div>
                        </div>
                        <div class="news_item item09">
                            <div class="news_img img09"><img src="img/original/news_09.png" alt="">
                            </div>
                            <div class="news_detail detail_09">
                                <p class="member_name">RYUJI KOGA</p>
                                <p class="comment">学校法人チーズ大学で事務等を経験。チーズダイエットで3ヶ月で13kg減少。チーズは美容にもオススメ。
                                </p>
                            </div>
                        </div>
                        <div class="news_item item10">
                            <div class="news_img img10"><img src="img/original/news_10.png" alt="">
                            </div>
                            <div class="news_detail detail_10">
                                <p class="member_name">KEIKO SHIGEMATSU</p>
                                <p class="comment">チーズ専門医。娘とチーズを嗜みたいと思い入学。先端チーズ医療を学びたい。</p>
                            </div>
                        </div>
                        <div class="news_item item11">
                            <div class="news_img img11"><img src="img/original/news_11.png" alt="">
                            </div>
                            <div class="news_detail detail_11">
                                <p class="member_name">REINA TAKAHASHI</p>
                                <p class="comment">
                                    市役所チーズ課で主にチーズ補助金を担当。チーズを通して自分と向き合い、チーズと共に歩むべき道を明確にしたい。
                                </p>
                            </div>
                        </div>
                        <div class="news_item item12">
                            <div class="news_img img12"><img src="img/original/news_12.png" alt=""></div>
                            <div class="news_detail detail_12">
                                <p class="member_name">KOUSUKE NAKAO</p>
                                <p class="comment">
                                    チーズをかじっている程度で、チーズ製造経験はありません。オリジナルチーズを外注したことあり。さらなるチーズ吸収のため入学しました。</p>
                            </div>
                        </div>
                        <div class="news_item item13">
                            <div class="news_img img13"><img src="img/original/news_13.png" alt=""></div>
                            <div class="news_detail detail_13">
                                <p class="member_name">KAYOKO NAMBA</p>
                                <p class="comment">
                                    チーズサイエンティストとしての知識を深めたい。子供に手作りチーズを食べさせたい。
                                </p>
                            </div>
                        </div>
                        <div class="news_item item14">
                            <div class="news_img img14"><img src="img/original/news_14.png" alt=""></div>
                            <div class="news_detail detail_14">
                                <p class="member_name">NORIAKI BANDO</p>
                                <p class="comment">世界中の人に愛されるような全く新しいチーズを製造したい。
                                </p>
                            </div>
                        </div>
                        <!-- No.15は無し -->
                        <div class="news_item item16">
                            <div class="news_img img16"><img src="img/original/news_16.png" alt=""></div>
                            <div class="news_detail detail_16">
                                <p class="member_name">NAOHIRO MADA</p>
                                <p class="comment">
                                    各種チーズ関連データをMAP上で一元管理するシステムを構築し、全ての人にチーズの喜びを届けたい。
                                </p>
                            </div>
                        </div>
                        <div class="news_item item17">
                            <div class="news_img img17"><img src="img/original/news_17.png" alt="">
                            </div>
                            <div class="news_detail detail_17">
                                <p class="member_name">RYUTO WATARI</p>
                                <p class="comment">
                                    NewYorkへチーズ留学経験あり。これまでチーズに縁がなかった人にも、チーズを通して世界が変わるような体験を届けたい。
                                </p>
                            </div>
                        </div>
                        <div class="news_item item18">
                            <div class="news_img img18"><img src="img/original/news_18.png" alt="">
                            </div>
                            <div class="news_detail detail_18">
                                <p class="member_name">NAOKO ISHIMARU
                                </p>
                                <p class="comment">
                                    世界のチーズ史を学ぶのが好き。チーズ語翻訳も得意です。</p>
                            </div>
                        </div>
                        <div class="news_item item19">
                            <div class="news_img img19"><img src="img/original/news_19.png" alt=""></div>
                            <div class="news_detail detail_19">
                                <p class="member_name">あなたもホストになってみませんか？</p>
                                <p class="comment"></p>
                            </div>
                        </div>
                        <div class="news_item item20">
                            <!-- 15が無い,20と21統合で20が最後のマス -->
                            <div class="news_detail detail_20">
                                <p class="member_name">WE ARE WAITING FOR YOU! </p>

                            </div>
                        </div>

                    </div> <!-- class="hide_inside_text" END -->
                </div> <!-- class="hide-text" END -->
            </div> <!-- id="text-wrap" END -->
        </div> <!-- news_big END -->
        <button class="readmore">READ MORE</button>



        <div class="access_box">
            <section id="access" class="section4">
                <div class="access_top">
                    <h2 class="yellow">
                        CONTACT</h2>
                    <h3>会社情報</h3>
                </div>
                <!-- class="access_top" END -->


                <div class="adress_text">
                    <div class="school s_box">
                        <div class="school_name title sch-title">
                            会社名</div>
                        <div class="school_name detail">
                            TABITOTO
                        </div>
                    </div>
                    <!-- class="school" END -->
                    <div class="office s_box">
                        <div class="office_name title">
                            事務所所在地</div>
                        <div class="office_name detail">
                            <p>〒810-0041
                            </p>
                            <p>福岡県福岡市中央区大名1丁目3-41
                            </p>
                            <p>プリオ大名ビル1F
                            </p>
                        </div>
                    </div>
                    <!-- class="office" END -->
                    <div class="tel s_box">
                        <div class="tel_number title">
                            TEL</div>
                        <div class="tel_number detail">
                            000-000-0000
                        </div>
                    </div>
                    <!-- class="tel" END -->
                    <div class="fax s_box">
                        <div class="fax_number title">
                            FAX</div>
                        <div class="fax_number detail">
                            999-999-9999
                        </div>
                    </div>
                    <!-- class="fax" END -->
                    <div class="mail s_box">
                        <div class="mail_adress title">
                            MAIL</div>
                        <div class="mail_adress detail">
                            dummy@tabitoto.fukuoka
                        </div>
                    </div>
                    <!-- class="mail" END -->
                </div>
                <!-- class="adress_text" END -->
            </section>
        </div>
        <!-- class="access_box" END -->

        <div class="contact_box">
            <section id="contact" class="section5">
                <div class="contact_box_text">
                    <h2 class="yellow">
                        イベントを企画する</h2>
                    <h3>自分の"好き"をシェアしたいかたはこちら
                    </h3>
                    <!-- <p>説明会は随時開催中。<br>その他、お問い合わせもお気軽にどうぞ。お待ちしております。
                    </p>
                    <p>※TABITOTOはまだ存在しません。<br>間違っても問い合わせしないようお願いいたします。
                    </p>
                </div>
                class="contact_box_text" END -->

                    <!-- <div class="contact_box_form">
                    <form method="POST" action="">
                        <div class="name_box s_box">
                            <div class="name_title left">
                                お名前</div>
                            <div class="name_writespace right">
                                <input type="text" name="name" value="" placeholder="例）山田太郎">
                            </div>
                        </div> -->
                    <!-- class="name_box" END -->
                    <!-- 
                        <div class="name_yomi_box s_box">
                            <div class="name_yomi_title left">
                                フリガナ</div>
                            <div class="name_yomi_writespace right">
                                <input type="text" name="name" value="" placeholder="例）ヤマダタロウ">
                            </div>
                        </div> -->
                    <!-- class="name_yomi_box" END -->

                    <!-- <div class="mail_box s_box">
                            <div class="mail_title left">
                                メールアドレス
                            </div>
                            <div class="mail_writespace right">
                                <input type="email" name="EMAIL" value="" placeholder="例）aa@aa.aa">
                            </div>
                        </div> -->
                    <!-- class="name_box" END -->

                    <!-- <div class="reason_box s_box">
                            <div class="reason_title left">
                                志望動機</div>
                            <div class="reason_checkspace right">
                                <input type="checkbox" name="entry" id="kigyo"><label for="kigyo">体験シェアに興味がある</label><br>
                                <input type="checkbox" name="entry" id="shushoku"><label for="checkbox">自分の好きを届けたい</label><br>
                                <input type="checkbox" name="entry" id="ikasu"><label for="ikasu">親子体験が得意分野</label><br>
                                <input type="checkbox" name="entry" id="kyoyo"><label for="kyoyo">TABITOTOの理念に共感する</label>
                            </div>
                        </div> -->
                    <!-- class="reason_box" END -->
                    <!-- 
                    <div class="select_box s_box">
                        <div class="select_title left">
                            チーズの好き嫌い
                        </div>
                        <div class="select_choice right">
                            <select name="cheese_favorite">
                                <option value="チーズが大好き" selected>
                                    チーズが大好き
                                </option>
                                <option value="どちらかというと好き">
                                    どちらかというと好き
                                </option>
                                <option value="どちらかというと嫌い">
                                    どちらかというと嫌い
                                </option>
                                <option value="チーズは大嫌い">
                                    チーズは大嫌い
                                </option>
                                <option value="わからない">
                                    わからない
                                </option>
                            </select>
                        </div>
                    </div> -->
                    <!-- class="select_box" END -->

                    <!-- <div class="detail_box s_box">
                        <div class="detail_title left">
                            備考</div>
                        <div class="detail_writespace right">
                            <textarea cols="35" rows="8">
                                                    </textarea>
                        </div>
                    </div> -->
                    <!-- class="detail_box" END -->
                    <a href="event_input.php" class="btn btn--orange">ホストになる</a>
                    <!-- <input type="submit" class="submit form-submit-button btn btn--orange"></button> -->
                    </form>
                </div>
                <!-- class="contact_box_form" END -->

            </section>
        </div>
        <!-- class="contact_box" END -->

    </main>

    <footer class="footer">
        <div class="footer_box">
            <div class="footer_text">
                copyrights 2021 TABITOTO All Rights Reserved.
            </div> <!-- class="footer_text" END -->
        </div> <!-- class="footer_box"END -->
    </footer>

    <script>
        $(function() {
            $(".readmore").on("click", function() {
                $(this).toggleClass("on-click");
                $(".hide-text").slideToggle(1000);
            });
        });
    </script>
</body>


</html>