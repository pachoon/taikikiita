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
  <!-- <link href="css/contact.css" rel="stylesheet" /> -->
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body  id="container" style="background-color: white;">


<?php

if(isset($_SESSION['login_user'])){

  require('parts/login_header.php');

}else{

  require('parts/header.php');
}

 ?>

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

        <div >
        <h1 class="section-header" align="center"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s" >お問い合わせ</span></h1>
        <div class="devider"></div>
        <h4 align="center" style="margin-bottom:30px; margin-top:20px;"><span style="color: black; margin-bottom:20px;">何かお困りですか？<br>サービスへのご意見、ご相談されたいことがあれば<br>お気軽に下記からご連絡をお待ちしております。</span></h4></div>
      </div>
      <div class="contact-section">
      <div class="container">
        <form method="POST" action="confirm_contact.php">
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="exampleInputUsername" style="font-size:16px;">Your name</label>
                <input type="text" name="username" class="form-control" id="" placeholder=" Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail" style="font-size:16px;">Email Address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email">
              </div>  
              <div class="form-group">
                <label for="telephone" style="font-size:16px;">Subject</label>
                <input type="tel" name="subject" class="form-control" id="telephone" placeholder=" Enter Subject" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for ="description" style="font-size:16px;"> Message</label>
                <textarea name="content" class="form-control" id="description" placeholder="Enter Your Message" required rows="5"></textarea>
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



</section>
</body>
</html>


