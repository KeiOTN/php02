<?php
// var_dump($_POST);
// exit();

// 500 Internal Server Error は処理継続不可能なエラーが発生した場合に返されます
// 500のエラー内容を確認する場合は以下を入れてください。
// 開発時は以下の設定を行い実行することをお勧めします。※リリース時は必ず削除してください。
// 参考：https://teratail.com/questions/56574
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// データ受け取れているか確認
// if (isset($_POST["remote_or_not"])) {
//     $remote_or_not = $_POST["remote_or_not"];
//     echo $remote_or_not; // 受け取った値を画面に出力
// }
// isset($_POST['event_name']) ok
// isset($_POST['event_detail']) ok
// isset($_POST['event_category']) ok
// isset($_POST['pref']) 都道府県コード（04とか）ok
// isset($_POST['city']) 市町村コード（04103とか） ok
// isset($_POST['remote_or_not']) ok
// isset($_POST['how_many']) ok
// isset($_POST['how_long']) ok
// isset($_POST['how_much_adult']) ok
// isset($_POST['limit_date']) ok
// isset($_POST['limit_time']) ok
// isset($_POST['min_person']) ok

// 入力していないときのエラーを細分化チェック
// if (
//     !isset($_POST['min_person']) || $_POST['min_person'] == ''
// ) {
//     exit('ParamError');
// }
// if (
//     !isset($_POST['event_name']) || $_POST['event_name'] == '' || ok
//     !isset($_POST['event_detail']) || $_POST['event_detail'] == '' || ok
//     !isset($_POST['event_category']) || $_POST['event_category'] == '' || ok
//     !isset($_POST['pref']) || $_POST['pref'] == '' || 選択しなくてもエラーでない
//     !isset($_POST['city']) || $_POST['city'] == '' || 選択しなくてもエラーでない
//     !isset($_POST['remote_or_not']) || $_POST['remote_or_not'] == '' || 選択しないという選択肢がない
//     !isset($_POST['how_many']) || $_POST['how_many'] == '' || ok
//     !isset($_POST['how_long']) || $_POST['how_long'] == '' || ok
//     !isset($_POST['how_much_adult']) || $_POST['how_much_adult'] == '' || ok
//     !isset($_POST['limit_date']) || $_POST['limit_date'] == '' || 選択しないという選択肢がない
//     !isset($_POST['limit_time']) || $_POST['limit_time'] == '' || 選択しないという選択肢がない
//     !isset($_POST['min_person']) || $_POST['min_person'] == ''
// ) {
//     exit('ParamError');
// }

// 入力チェック(未入力の場合は弾く，commentのみ任意) 
// issetは「ありますか？」、!isset「ないですよね」
//  || は or の意味
if (
    !isset($_POST['event_name']) || $_POST['event_name'] == '' ||
    !isset($_POST['event_detail']) || $_POST['event_detail'] == '' ||
    !isset($_POST['event_category']) || $_POST['event_category'] == '' ||
    // !isset($_POST['pref']) || $_POST['pref'] == '' || 
    // !isset($_POST['city']) || $_POST['city'] == '' || 
    // !isset($_POST['remote_or_not']) || $_POST['remote_or_not'] == '' || 
    !isset($_POST['how_many']) || $_POST['how_many'] == '' ||
    !isset($_POST['how_long']) || $_POST['how_long'] == '' ||
    !isset($_POST['how_much_adult']) || $_POST['how_much_adult'] == '' ||
    // !isset($_POST['limit_date']) || $_POST['limit_date'] == '' || 
    // !isset($_POST['limit_time']) || $_POST['limit_time'] == '' || 
    !isset($_POST['min_person']) || $_POST['min_person'] == ''
) {
    exit('ParamError');
}  // ここまでok

// データを変数に格納
$event_name = $_POST['event_name'];
$event_detail = $_POST['event_detail'];
$event_category = $_POST['event_category'];
$pref = $_POST['pref'];
$city = $_POST['city'];
$remote_or_not = $_POST['remote_or_not'];
$how_many = $_POST['how_many'];
$how_long = $_POST['how_long'];
$how_much_adult = $_POST['how_much_adult'];
$limit_date =  $_POST['limit_date'];
$limit_time = $_POST['limit_time'];
$min_person = $_POST['min_person'];


// DB接続情報
// 毎回同じなので覚える必要はない
$dbn = 'mysql:dbname=tabitoto;charset=utf8;port=3306;host=localhost';
$user = 'root'; // 初期状態はroot
$pwd = ''; // 空文字

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]); // データベース接続に失敗
    exit();
}
// exit('ok');
// データベース接続OKを確認

// SQL作成&実行
$sql = 'INSERT INTO
event_list(id, event_name, event_detail, event_category, pref, city, remote_or_not, how_many, how_long, how_much_adult, limit_date, limit_time, min_person, created_at, updated_at) VALUES(NULL, :event_name, :event_detail, :event_category, :pref, :city, :remote_or_not, :how_many, :how_long, :how_much_adult, :limit_date, :limit_time, :min_person, sysdate(), sysdate())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':event_name', $event_name, PDO::PARAM_STR);
$stmt->bindValue(':event_detail', $event_detail, PDO::PARAM_STR);
$stmt->bindValue(':event_category', $event_category, PDO::PARAM_STR);
$stmt->bindValue(':pref', $pref, PDO::PARAM_INT);
$stmt->bindValue(':city', $city, PDO::PARAM_INT);
$stmt->bindValue(':remote_or_not', $remote_or_not, PDO::PARAM_STR);
$stmt->bindValue(':how_many', $how_many, PDO::PARAM_INT);
$stmt->bindValue(':how_long', $how_long, PDO::PARAM_INT);
$stmt->bindValue(':how_much_adult', $how_much_adult, PDO::PARAM_INT);
$stmt->bindValue(':limit_date', $limit_date, PDO::PARAM_STR);
$stmt->bindValue(':limit_time', $limit_time, PDO::PARAM_INT);
$stmt->bindValue(':min_person', $min_person, PDO::PARAM_INT);
$status = $stmt->execute(); // SQLを実行
// exit('ok');


// 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status == false) {
    $error = $stmt->errorInfo(); // データ登録失敗時にエラーを表示 
    exit('sqlError:' . $error[2]);
} else {
    // 登録ページへ移動
    header('Location:index.php');
}
