<?php
// SESSIONスタート
SESSION_start();


// SESSIONのidを取得
$sid = session_id();
echo $sid;

// SESSION変数
$_SESSION['name'] = '古内啓樹';
$_SESSION['age'] = 37;
$_SESSION['from'] = 'Kawasaki';

?>