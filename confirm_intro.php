<?php


  session_start();


  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');


    //一度も入力せずに飛んだ人は登録画面へ飛ばす。
  if(!isset($_SESSION['user_info'])){
    header('Location: signup.php');
    exit();
  }

  if(!empty($_POST)){

      $username = $_SESSION['user_info']['username'];
      $email = $_SESSION['user_info']['email'];
      $password = $_SESSION['user_info']['password'];
      $gender = $_SESSION['user_info']['gender'];
      $school = $_SESSION['user_info']['school'];
      $introduce = $_SESSION['user_info']['introduce'];
      $picture_path = $_SESSION['user_info']['picture_path'];


      $sql = 'UPDATE `cebty_users` SET `username`=?,
                                              `email`=?,
                                              `password`=?,
                                              `gender`=?,
                                              `school`=?,
                                              `introduce`=?,
                                              `picture_path`=?,
                                              `created`=NOW()
                                              WHERE `id` =?';

      $data = array($username,$email,sha1($password),$gender,$school,$introduce,$picture_path, $_SESSION['login_user']['id']);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);

      $_SESSION['user_info']['id']= $_SESSION['login_user']['id'];
      $_SESSION['user_info']['created']= $_SESSION['login_user']['created'];
      $_SESSION['login_user']=$_SESSION['user_info'];

      header('Location: finish_edit_intro.php');
      exit();

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
  <title>登録内容確認</title>
</head>
<body>


<?php

if(isset($_SESSION['login_user'])){

  require('parts/login_header.php');

}else{

  require('parts/header.php');
}

 ?>

<?php require('parts/assets.php') ?>


<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg2.jpg); ">

<div class="container" style="padding-top:130px;">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 well">
            <h5 class="text-center">登録内容確認</h5>
            <div class="devider"></div>
            <form action="#" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                  <p>ユーザーネーム： <?php echo $_SESSION['user_info']['username']; ?></p>
                </div>
            </div>
            <p>メールアドレス：<?php echo $_SESSION['user_info']['email'];?> </p>
            <p>パスワード：●●●●●●●●●</p>

<!--             <label for="" style="font-size:12px;padding-bottom:5px;">
                生年月日</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" style="height:28px; font-size:12px;">
                        <option value="Month">月</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" style="height:28px; font-size:12px;">
                        <option value="Day">日</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" style="height:28px; font-size:12px;">
                        <option value="Year">年</option>
                    </select>
                </div>
            </div> -->

            <p>性別：<?php echo $_SESSION['user_info']['gender']; ?></p>
            <p>学校名：<?php echo $_SESSION['user_info']['school']; ?></p>
            <p>自己紹介：<?php echo $_SESSION['user_info']['introduce']; ?></p>

            <p>プロフィール画像：</p>
            <img src="profile_image/<?php echo $_SESSION['user_info']['profile_image_path'];?>" width="150">

            <div class="preview" style="padding-bottom:7px;"></div>

            <div class="row">
               <div class="col-sm-6 col-md-6">
                <input type="hidden" name="action" value="submit">
                 <button class="btn btn-md btn-primary btn-block" type="submit">更新する</button>
               </div>
               <div class="col-sm-6 col-md-6">
                 <a href="javascript:history.back()" class="btn btn-md btn-danger btn-block">もどる</a>
               </div>
            </div>

            </form>
        </div>
    </div>
</div>

</section>

            <footer class="text-off-white">


                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                       
                    </div>
                </div>

            </footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>

$(function(){
  //画像ファイルプレビュー表示のイベント追加 fileを選択時に発火するイベントを登録
  $('form').on('change', 'input[type="file"]', function(e) {
    var file = e.target.files[0],
        reader = new FileReader(),
        $preview = $(".preview");
        t = this;

    // 画像ファイル以外の場合は何もしない
    if(file.type.indexOf("image") < 0){
      return false;
    }

    // ファイル読み込みが完了した際のイベント登録
    reader.onload = (function(file) {
      return function(e) {
        //既存のプレビューを削除
        $preview.empty();
        // .prevewの領域の中にロードした画像を表示するimageタグを追加
        $preview.append($('<img style="padding-top:5px;">').attr({
                  src: e.target.result,
                  width: "150px",
                  class: "preview",
                  title: file.name
              }));
      };
    })(file);

    reader.readAsDataURL(file);
  });
});


</script>



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