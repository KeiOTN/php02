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
        $output .= "</div>";
    }
    //print($output);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>体験一覧</title>
    <style>
        h1 {
            font-size: 1.5em;
        }

        .event_all {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }

        .event_each {
            width: 25%;
            position: relative;
            background: #fff0cd;
            box-shadow: 0px 0px 0px 5px #fff0cd;
            border: dashed 2px white;
            margin: 2%;
            padding: 0.2em 0.5em;
            color: #454545;
        }

        .event_each:after {
            position: absolute;
            content: '';
            right: -7px;
            top: -7px;
            border-width: 0 15px 15px 0;
            border-style: solid;
            border-color: #ffdb88 #fff #ffdb88;
            box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15);
        }

        .event_each p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div>
        <div>体験一覧(管理用)</div>
        <a href="event_input.php">体験登録画面</a>


        <div class="event_all">
            <?= $output ?>
        </div>
</body>

</html>