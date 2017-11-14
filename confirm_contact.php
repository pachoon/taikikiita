<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">  
  <meta charset="utf-8">
  <title>お問い合わせ内容確認</title>
  <link href="css/confirm_contact.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
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
        <h1 class="section-header" align="center"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s" style="color: black">お問い合わせ</span></h1>
        <h3 align="center"><span style="color: black" >内容確認画面</span></h3>
      </div>
      <div class="contact-section">
      <div class="container">

        
          <?php

        // empty関数について
        // 存在の有無をチェックする関数
        // 構文：
        // empty(チェックしたい変数)

        // empty関数でチェックした内容はtrue or falseで結果を返します。
        if(empty($_POST)){
          echo 'お問い合わせ内容を入力してください';
  // PHPの処理を強制停止させるexit
        exit();

        }
  // 上は、PCのURLの「$_GET」つまり、「？以下」を消して更新すると、「$_GETは空ですよ(=データを入力してください)」が表示される。



        $username=htmlspecialchars($_POST['username']);
        $email=htmlspecialchars($_POST['email']);
        $subject=htmlspecialchars($_POST['subject']);
        $content=htmlspecialchars($_POST['content']);



  // 上を記述した理由は、もしフォームに何も入れず「送信」ボタンをクリックした場合、check.phpには何も表示されないから、フォームに値が入っていなかったら「○○○が入力されていません。」と注意文を表示するようにし、何かしらの値が入っていたらその値を表示させるため定義した。

        // フォームで受け取ったデータを何回も使用する場合は、最初に変数を用意し（例：$nickname）、その変数に値を格納して使用すると便利です。上みたく。
        
        if($username==''){
          $_username= 'Your nameが入力されていません';
        }else{
          $_username= 'Your name：'.$username;
        }
        //echo '<br>';

        if($email==''){
          $_email= 'Email Addressが入力されていません';
        }else{
          $_email = 'Email Address：'.$email;
        }
        //echo '<br>';

        if($subject==''){
          $_subject= 'Subjectが入力されていません';
        }else{
          $_subject= 'Subject：'.$subject;
        }
        // echo '<br>';

         if($content==''){
          $_content= 'contentが入力されていません';
        }else{
          $_content= 'content：'.$content;
        }
        // echo '<br>';

        ?>

<form method="POST" action="finish_contact.php">
  <?php if($username!='' && $email!='' && $subject!='' && $content!=''){?>
              <!-- type=hiddenで入力項目を作らずに、隠しデータとしてデータを送信する -->
                <input type="hidden" name="username" value="<?php echo $username;  ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                <input type="hidden" name="content" value="<?php echo $content; ?>">
      <!-- 【重要】$マークやif文はPHPで使われるもの。<input>タグ　はHTMLだから上記のように「$XXXXXXX」はPHPだから<?php?>を使う！！！
       -->

                <!-- inputタグのhiddenはめちゃくちゃ使う！ちなみに、inputタグはformタグでしか使えないから、hiddenもformタグでしか使えない。 -->
              <?php } ?>
  <div class="modalin" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">お間違いはないでしょうか？</h4>
        </div>
        <div class="modal-body">
          <!-- <p>お間違いはないでしょうか？</p> -->
          <?php echo 'Your name: '.$username; ?><br>
          <?php echo 'Email Address: '.$email; ?><br>
          <?php echo 'Subject: '.$subject; ?><br>
          <?php echo 'Message: '.$content; ?><br>
          <div class="row">
              <div class="col-12-xs text-center">
                <button type="submit" class="btn btn-default submit" >
                <i class="fa fa-paper-plane" aria-hidden="true"></i>  Send</button>                             <button class="btn btn-default submit" onclick="history.back()" formaction="contact.php"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Back</button>
      </form>
  

                  <!-- <button class="btn btn-success btn-md">Yes</button>
                  <button class="btn btn-danger btn-md">No</button> -->
              </div>
          </div>
        </div>
     
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
      </div>
    </section>
  <?php require('parts/footer.php'); ?>

</body>
</html>


