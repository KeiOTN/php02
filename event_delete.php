<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// var_dump($_POST);
// exit();

include('functions.php');
$pdo = connect_to_db();

// idをgetで受け取る
$id = $_GET['id'];
// var_dump($id);
// exit();

// idを指定して更新するSQLを作成 -> 実行の処理
$sql = 'DELETE FROM event_list WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
// 一覧画面にリダイレクト
header('Location:event_read.php');
