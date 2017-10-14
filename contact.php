<?php
  session_start();
  require('dbconnect.php');

  // ログイン状態かチェック
if(!isset($_SESSION['login_user']['id'])){
    // セッションデータを保持しているかチェック
    // セッションデータがなければ、ログインページへ飛ばす
    header('Location: login.php');
    exit();

 } ?>


 
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">  
  <meta charset="utf-8">
  <title>お問い合わせ</title>
  <link href="css/contact.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body style="background-color: #3a6186 , #89253e" id="container">
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> ai



<?php
session_start();

  if(isset($_SESSION['login_user']['id'])){
    require('parts/login_header.php');
}else{
    require('parts/header.php');
} ?>



<<<<<<< HEAD
=======
<?php

if(isset($_SESSION['login_user'])){

  require('parts/login_header.php');

}else{

  require('parts/header.php');
}

 ?>
>>>>>>> ai
=======
>>>>>>> ai
  <div class="container">
    <div class="row">
    </div>
  </div>
<div class="body">
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

        <h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">お問い合わせ</span></h1>
        <h3><span style="color: #fffff9">何かお困りですか？<br>サービスへのご意見、ご相談されたいことがあれば<br>お気軽に下記からご連絡をお待ちしております。</span></h3>
      </div>
      <div class="contact-section">
      <div class="container">
        <form method="POST" action="confirm_contact.php">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="exampleInputUsername">Your name</label>
                <input type="text" name="username" class="form-control" id="" placeholder=" Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Email Address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email">
              </div>  
              <div class="form-group">
                <label for="telephone">Subject</label>
                <input type="tel" name="subject" class="form-control" id="telephone" placeholder=" Enter Subject" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for ="description"> Message</label>
                <textarea name="content" class="form-control" id="description" placeholder="Enter Your Message" required></textarea>
              </div>
              <div>

                <button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Confirm</button>
              </div>
              
          </div>
        </form>
      </div>
      </div>
        <br>
        <br>
        <br>
        <br>
            <footer class="text-off-white">


                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                        <p class="copyright">Copyright &copy; 2017 - Designed By <a href="" class="theme-author">TaikiKiita</a> &amp; Developed by <a href="" class="theme-author">NagamiTaiki</a></p>
                    </div>
                </div>

            </footer>
</section>
</body>
</html>


