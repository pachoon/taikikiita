<?php 

  session_start();
  require('dbconnect.php');

  // ログインチェック
if(!isset($_SESSION['login_user']['id'])){
    header('Location: login.php');
    exit();
}



$sql = "SELECT * FROM `cebty_chat` WHERE `user_id`=? OR `other_id`=? ORDER BY `cebty_chat`.`created` DESC" ;
$data = array($_SESSION['login_user']['id'], $_SESSION['login_user']['id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

  $chats=array();
  while(true){
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  //$recordはデータベースのカラム値をkeyとする連想配列で構成されます.(データベースから１件取ってきます)
  if(!$record){
     break;
  }
  $chats[]=$record;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>

  <link rel="stylesheet" href="css/style.css">  
  <meta charset="utf-8">
  <title>チャット一覧</title>
  <link href="css/chat_list.css" rel="stylesheet" />


  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php require('parts/assets.php'); ?>
</head>
<body style="background-color: #3a6186 , #89253e">

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
 
        <h1 class="section-header" style="text-align: center;"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> チャット一覧</span></h1>
        <br>
        <br>
<div class="container">
  <div class="row">




    <section class="content">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-filter" data-target="send">送信（購入者）</button>
                <button type="button" class="btn btn-warning btn-filter" data-target="recieve">受信（出品者）</button>
                <!-- <button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button> -->
                <button type="button" class="btn btn-default btn-filter" data-target="all">全て</button>
              </div>
            </div>










  <?php foreach ($chats as $chat) {?>
             <div class="table-container" >
              <table class="table table-filter">
                <tbody>
                  <tr data-status="<?php if($chat['user_id']==$_SESSION['login_user']['id']){
                    echo 'send';
                  }else{
                    echo 'recieve';
                  } ?>">
                    
                    <td>
                      <div class="media" style="width: 648px;">
                        <a href="#" class="pull-left">
                          <img src="profile_image/<?php echo $chat['picture_path'];?>" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right"><?php echo $chat['modifid'];?></span>
                          <h4 class="title">
                            <?php echo $chat['user_id'];?>
                            <span class="pull-right recieve"><?php if($chat['user_id']==$_SESSION['login_user']['id']){
                    echo '送信
                    ';
                  }else{
                    echo '受信';
                  } ?></span>
                          </h4>
                          <p class="summary"><?php echo $chat['comment'];?></p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>



















                  <!-- <tr data-status="recieve">
                    
                    <td>
                      <div class="media" style="width: 648px;">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right recieve">(recieve)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr data-status="recieve">
                    
                    <td>
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right recieve">(recieve)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr data-status="send" class="selected">
                    
                    <td>
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right send">(send)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr data-status="send">
                    
                    <td>
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right send">(send)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
</div> --> 

<script type="text/javascript">
  $(document).ready(function () {

  $('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>

</body>

</html>

