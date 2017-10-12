<?php 
  //削除機能は押したら削除処理が走るだけ
  //固有の画面は作らない
session_start();

$dsn = 'mysql:dbname=cebty;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

     if(!isset($_SESSION['login_user']['id'])){
    //セッションデータを保持しているかチェック
    //セッションデータがなければ、ログインページに飛ばす。
      header('Location:login.php');
      exit();
     }

//ここはログインしたユーザーが通る
//パラメーターチェック
// if(!isset($_GET['id'])){
//   header('Location: timeline.php');
//   exit();
// }

//本人チェック(削除ツイートが自分のツイートかどうか)
//ログインユーザーは$_SESSION['login_user']['id']を保持している
//削除するツイートのuser_idのカラムが==$_SESSION['login_user']['id']
//であれば削除できる。というif文で対策する。
//まずは、tweetsテーブルのid=_GET['id']のレコードを入手する
$sql = 'SELECT`user_id` FROM `cebty_items` WHERE `id`=?';
$data= array($_GET['item_id']);
$stmt= $dbh->prepare($sql);
$stmt->execute($data);

$record = $stmt->fetch(PDO::FETCH_ASSOC);
if($record['user_id']==$_SESSION['login_user']['id']){
  echo'削除可能';
  $sql = 'DELETE FROM `cebty_items` WHERE `id`=?';
  $data= array($_GET['item_id']);
  $stmt= $dbh->prepare($sql);
  $stmt->execute($data);
}else{
  $content='他の人の投稿商品です。削除できません。';
  header('Location:edit_putup.php?ng=on&content='.$content);
  exit();
}

// echo "id".$_GET['id']."<br>";
// echo "u_id".$_SESSION['login_user']['id'];
 //exit();
  //削除処理を記載

$content=$record['item_name'];
  //削除終了後、timelineに飛ばす
header('Location:edit_putup.php?delete=on&content='.$content);
exit();

 ?>