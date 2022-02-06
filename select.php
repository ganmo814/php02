<?php
//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//LoginCheck
loginCheck();

//ユーザー管理
$user_name = $_SESSION['name'];
$kanri_flg = $_SESSION['kanri_flg'];//0が一般で1が管理者

//1.  DB接続します
// try {
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=graypanda56_gs_kadai_db;charset=utf8;host=mysql57.graypanda56.sakura.ne.jp','graypanda56','hgkyfm-ahksrrf7');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

//↑関数化
require_once('funcs.php');
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>';
    $view .= '<a href="bm_update_view.php?id='.$result['id'].'">';
    $view .= $result["indate"].":".$result["name"]." ".$result["url"]." ".$result["comment"];
    $view .= '</a>';
    $view .= '<a href="delete.php?id='.$result['id'].'">';
    $view .= '[ 削除 ]';
    $view .= '</a>';
    $view .= '</p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>お気に入りの本一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">お気に入りの本の登録</a>
      </div>
      <p><?= $user_name ?></p>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
