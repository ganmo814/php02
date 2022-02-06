<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お気に入りの本の登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">お気に入りの本一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div><!-- ここを追記 -->  
  </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset style="margin-left: 40px">
    <legend>お気に入りの本の登録</legend>
     <label>書籍名：<input type="text" name="name" style="margin-left: 50px"></label><br>
     <label>書籍URL：<input type="text" name="url" style="margin-left: 35px"></label><br>
     <label>書籍コメント：<textArea name="comment" rows="4" cols="40" style="margin-left: 2px"></textArea></label>
     <br><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
