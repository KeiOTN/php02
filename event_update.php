<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// var_dump($_POST['id']);
// exit();

include('functions.php');
$pdo = connect_to_db();

// データを変数に格納
$event_name = $_POST['event_name'];
$event_detail = $_POST['event_detail'];
$how_many = $_POST['how_many'];
$how_long = $_POST['how_long'];
$how_much_adult = $_POST['how_much_adult'];
$min_person = $_POST['min_person'];
$id = $_POST['id'];



$sql = "UPDATE event_list SET event_name=:event_name, event_detail=:event_detail, how_many=:how_many, how_long=:how_long, how_much_adult=:how_much_adult, min_person=:min_person,
updated_at=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':event_name', $event_name, PDO::PARAM_STR);
$stmt->bindValue(':event_detail', $event_detail, PDO::PARAM_STR);
// $stmt->bindValue(':event_category', $event_category, PDO::PARAM_STR);
// $stmt->bindValue(':pref', $pref, PDO::PARAM_INT);
// $stmt->bindValue(':city', $city, PDO::PARAM_INT);
// $stmt->bindValue(':remote_or_not', $remote_or_not, PDO::PARAM_STR);
$stmt->bindValue(':how_many', $how_many, PDO::PARAM_INT);
$stmt->bindValue(':how_long', $how_long, PDO::PARAM_INT);
$stmt->bindValue(':how_much_adult', $how_much_adult, PDO::PARAM_INT);
// $stmt->bindValue(':limit_date', $limit_date, PDO::PARAM_STR);
// $stmt->bindValue(':limit_time', $limit_time, PDO::PARAM_INT);
$stmt->bindValue(':min_person', $min_person, PDO::PARAM_INT);
$status = $stmt->execute(); // SQLを実行
// exit('ok');


// 各値をpostで受け取る
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常に実行された場合は一覧ページファイルに移動し，処理を実行する
    header("Location:event_read.php");
    exit();
}
