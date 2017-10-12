<?php

session_start();


  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');


if(!empty($_POST)){
  //バリデーション(入力チェック)

  $email = $_POST['email'];
  $password = $_POST['password'];

    if($email == ''){
        $errors['email'] = 'blank';
    }
    if($password == ''){
        $errors['password'] = 'blank';
    } elseif(strlen($password) < 4) {
      //strlen()関数 文字の数をカウントする
        $errors['password'] = 'length';
    }



 //ログイン処理を記述
    if(empty($errors)){
      //全てのエラーがなければ、処理実行
      $sql = 'SELECT * FROM `cebty_users` WHERE `email` = ?
                                    AND `password` = ?';
      $data = array($email, sha1($password));
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);
      //セレクト文を実行した結果を取得する
      $record = $stmt->fetch(PDO::FETCH_ASSOC);


  ///ログインできれば
  if($record != false){
    //データが一致しました
    //本人確認完了
    $_SESSION['login_user']=$record;

    header('Location: login_index.php');
    exit();
  }else{
    //ログインできなければ
    $errors['login'] = "NG";
  }
}

}

 ?>





<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/animations/css/animate.min.css">
    <link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">
  <meta charset="utf-8">
  <title>ログイン</title>
</head>
<body>

<?php


  require('parts/header.php');


 ?>
<?php require('parts/assets.php') ?>

<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg2.jpg); ">

<div class="container" style="padding-top:200px;">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 well">
            <h5 class="text-center" style="padding-bottom:5px;">ログイン</h5>
            <div class="devider"></div>
            <form action="#" method="post" class="form" role="form" enctype="multipart/form-data">

            <input class="form-control" name="email" placeholder="メールアドレス" required type="email" style="height:28px; font-size:12px;"/>
            <input class="form-control" name="password" placeholder="パスワード" required type="password" style="height:28px; font-size:12px;"/>


            <button class="btn btn-md btn-primary btn-block" type="submit">
                ログイン</button>
                <div class="text-center" style="padding-top:15px;"><a onclick="gate();">新規登録はこちらから</a></div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">

function gate(){
   // ▼ユーザの入力を求める
   var UserInput;
   UserInput = prompt("パスワードを入力して下さい:","");
   // ▼入力内容をチェック
   if(UserInput == "nexseed" ) {
     location.href = 'signup.php';
   }
   // ▼キャンセルをチェック
   else if(UserInput != null && UserInput != "nexseed"){
          // ▼入力内容からファイル名を生成して移動
       alert("パスワードが間違っています。");
   }
}
</script>












</section>

            <footer class="text-off-white">


                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                       
                    </div>
                </div>

            </footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



    <script src="inc/jquery/jquery-1.11.1.min.js"></script>
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="inc/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="inc/stellar/js/jquery.stellar.min.js"></script>
    <script src="inc/animations/js/wow.min.js"></script>
    <script src="inc/waypoints.min.js"></script>
    <script src="inc/isotope.pkgd.min.js"></script>
    <script src="inc/classie.js"></script>
    <script src="inc/jquery.easing.min.js"></script>
    <script src="inc/jquery.counterup.min.js"></script>
    <script src="inc/smoothscroll.js"></script>

</body>
</html>