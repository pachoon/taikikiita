<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">  
  <meta charset="utf-8">
  <title>お問い合わせ完了</title>
  <link href="css/confirm_contact.css" rel="stylesheet" />


  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body>
<body>

  <?php require('parts/header.php'); ?>
  <div class="container">
    <div class="row">
    </div>
  </div>

<section id="contact">
      <div class="section-content">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">Get Touch with us</span></h1>
        <h3><span style="color: #fffff9">お問い合わせ完了！</span></h3>


<div class="modalin" style="display: block;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">お問い合わせいただきまして誠にありがとうございます！</h4>
      </div>
      <div class="modal-body">
        <p>お問い合わせいただきました内容につきましては、追ってご連絡をお待ちくださいね</p>
        <button type="submit" class="btn btn-default submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>  Back</button>
        <div class="row">
            <div class="col-12-xs text-center">
            </div>
        </div>
      </div>
   
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<?php


    if(empty($_POST)){
        echo 'データを入力してください';
// PHPの処理を強制停止させるexit
// ページをリダイレクトする処理
// header('Location:飛ばしたいファイルパス');
// exit();とセットで使用します。
        header('Location:contact.php');
        exit();
    }
// ★★★★★★★★★★★★ポイント★★★上のリダイレクトの結果が、URLの部分で〜thanks.phpに直接書いて、飛ぼうとすると自動で、〜index.htmlに飛ぶ

    // // echo 'thanks';
    // echo $_POST['nickname'];
    // echo '<br>';
    // echo $_POST['email'];
    // echo '<br>';
    // echo $_POST['content'];

//■■■■■■■■■■■PHPとMySQLの連携 
    // PHPはデータを保存できず、メモ書き程度のもの。だから、永久保存ができるMySQlを使う。
  // MySQLを使ってデータの処理ができます。(INSERT ,SELECTなど)
  // ここから実戦でPHPからMySQLを操作してデータを処理していきます。
  // ユーザーが入力したお問い合わせ内容をINSERT文を使って、
  // データベースへ保存をします。
  // 主に3ステップが必要です。





// ■■■■■■■■■■PHPとMySQLの連携の３ステップ
// ★★★★★★★★★★★★★★★★★ステップ１：データベースとの接続（限られた人にしかアクセスして欲しくないから、こんなに多くのコードをかく）
// ！！！！丸暗記！！！！！！
    $dsn = 'mysql:dbname=★★★★★★★★;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8'); 

    // $dsn = 'mysql:dbname=①データベース名;host=②アクセスするサーバー名';
    // $user = '③アクセスするユーザー名';
    // $password = '④アクセスするユーザーのパスワード';
    // $dbh = new PDO($dsn, $user, $password);
    // $dbh->query('SET NAMES utf8'); 

    // ①接続したいデータベース名
    // ②アクセスするサーバーの場所
    // ③アクセスするユーザー名
    // ④アクセスするユーザーのパスワード
    // を環境に応じて設定する


// ★★★★★★★★★★★★★ステップ２ SQL文の実行(テーブルや文字列を使いたいときはバッククォート「｀｀」を使う)
    // $sql = 'INSERT INTO `users` SET
    //                     `nickname`=?,
    //                     `email`=?,
    //                     `content`=?';

    $sql = 'INSERT INTO `users` SET
                        `nickname`=?,
                        `email`=?,
                        `content`=?';

    // echo $sql;
    // echo '<br>';

  
// <!-- ？に対応したデータを配列形式で定義する (みやすくするために、変数に入れる。そのまま右辺を使ってもいい。)-->



    $data=array($nickname,$email,$content);
    // echo $data[0];=>$nicknameの値。
    // // すなわち最初のページのニックネームの値が入る。
    // echo $data[1];=>$emailの値。
    // // すなわち最初のページのemailの値が入る。
    // echo $data[2];=>$contentの値。
    // // すなわち最初のページの問い合わせ内容の値が入る。


// 使うSQL文をセットする（準備）※準備した状態（右辺）を左辺に代入
    $stmt=$dbh->prepare($sql);
// セットしたSQL文を実行している
    $stmt->execute($data);

// ①接続情報
//     $dsn = 'mysql:dbname=phpkiso;host=localhost';
//     $user = 'root';
//     $password = '';
//     $dbh = new PDO($dsn, $user, $password);
//     $dbh->query('SET NAMES utf8'); 


  // ②SQL文、 ③SQL文実行
  // $sql = ''; //変数を使う場合は？マークを代わりに使用します.攻撃対象になるから、直接$nicknameなどは入れずに、「？」を入れる。
  // $stmt = $dbh->prepare($sql); 
  // $data = array(); //？マークを配列順で上書き
  // $stmt->execute($data); 

    // ステップ３：データベース切断
    $dbh=null;
    echo 'お問い合わせいただきまして誠にありがとうございます。<br>';
    echo 'お問い合わせいただきました内容につきましては、追ってご連絡をお待ちください。';

?>

</body>
</html>
