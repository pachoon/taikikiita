<?php 
  // 削除機能は押したら削除処理が走るだけ
  // 固有の画面は作らない

  session_start();
  require('dbconnect.php');

  // ログインチェック
if(!isset($_SESSION['login_user']['id'])){
    header('Location: login.php');
    exit();
}

  // ここはログインしたユーザーが通る
  // パラメータチェック
  if(!isset($_GET['item_id'])){
    header('Location: favorite2.php');
    exit();
  }

  // 本人チェック (削除ツイートが自分のツイートかどうか)
  // ログインユーザーは$_SESSION['login_user']['id']を保持している
  // 削除するツイートのuser_idのカラムが==$_SESSION['login_user']['id']
  // であれば削除できる。というif文で対策する。
  // まずは、tweetsテーブルのid=$_GET['id']のレコードを入手する
  $sql = 'SELECT * FROM `cebty_items` WHERE `id`=?';
  $data = array($_GET['item_id']);
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);

  // 1件のみなので、Whileでループさせず、一件目のみFetchする
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  if($record['user_id']==$_SESSION['login_user']['id']){
      echo '削除可能！';
      // 削除(DELETE文のSQLを記述で完了！)
      $sql = 'DELETE FROM `cebty_items` WHERE `id`=?';
      $data = array($_GET['item_id']);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);

  } 
      // else {
  //    $content='他の人のツイートです。削除できません。';
  //    // 他の人のツイートを削除しようとしたらお帰り頂く
  //     header('Location: timeline.php?ng=on&content='.$content);
  //     exit();
  // }


  // echo "id".$_GET['id']."<br>";
  // echo "user_id".$_SESSION['login_user']['id'];
  // exit();
  // 削除処理記載
  $content=$record['item_name'];
  // 削除終了後、timelineに飛ばす
  header('Location: edit_putup.php?login_user_id='.$_SESSION['login_user']['id'].'');
  exit();












 ?>