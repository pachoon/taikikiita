<?php 

  session_start();
  require('dbconnect.php');

  // ログインチェック
if(!isset($_SESSION['login_user']['id'])){
    header('Location: login.php');
    exit();
}



$sql = "SELECT `cebty_chat`.*, `cebty_users`.`username`,`cebty_users`.`picture_path`
        FROM `cebty_chat`
        LEFT JOIN `cebty_users`
        ON `cebty_chat`.`chat_user_id` = `cebty_users`.`id`
        WHERE `chat_user_id`=? 
        OR `other_id`=? 
        ORDER BY `cebty_chat`.`created` DESC" ;
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

$sql='SELECT `cebty_chat`.*, `cebty_users`.*
      FROM `cebty_chat`
      LEFT JOIN`cebty_users`
      ON `cebty_chat`.`chat_user_id` = `cebty_users`.`id`
      WHERE `cebty_chat`.`chat_user_id`=?';
$data = array($_SESSION['login_user']['id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);
$join = $stmt->fetch(PDO::FETCH_ASSOC);



// $sql='SELECT `cebty_chat`.*, `cebty_users`.*
//       FROM `cebty_chat`
//       LEFT JOIN`cebty_users`
//       ON `cebty_chat`.`other_id` = `cebty_users`.`id`
//       WHERE `cebty_chat`.`user_id`=`cebty_users`.`id` 
//                                 AND `cebty_chat`.`other_id`=?';
// $data = array($_SESSION['login_user']['id']);
// $stmt = $dbh->prepare($sql);
// $stmt->execute($data);
// $others = $stmt->fetch(PDO::FETCH_ASSOC);

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
<body style="
background-color: #ffffff;
background-color: transparent;
background: #3a6186; /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
height: 100%;
text-align: center; 
">

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
                  <tr data-status="<?php if($chat['chat_user_id']==$_SESSION['login_user']['id']){
                    echo 'send';
                  }else{
                    echo 'recieve';
                  } ?>">
                    
                    <td>
                      <div class="media" style="width: 648px;">
                        <p align="left" style="font-size: 30px"><?php if($chat['chat_user_id']==$_SESSION['login_user']['id']){
                          echo $chat['username'];
                        }else{
                          echo $chat['username'];
                        }?>
                        </p>
                        <?php if($chat['chat_user_id']==$_SESSION['login_user']['id']){?>
                          <a  href="chat.php?item_id=<?php echo $chat['item_id'];?>&user_id=<?php echo $chat['other_id'];?>&login_id=<?php echo $_SESSION['login_user']['id'];?>&other_id=<?php ;?>" class="pull-left">
                        <?php }else{ ?>
                          <a  href="chat.php?item_id=<?php echo $chat['item_id'];?>&user_id=<?php echo $chat['other_id'];?>&login_id=<?php echo $_SESSION['login_user']['id'];?>" class="pull-left">
                        <?php }?>

                        <?php if($chat['chat_user_id']==$_SESSION['login_user']['id']){ ?>
                            <img class="img-thumbnail"  align="left" alt="140x140" src="profile_image/<?php echo $_SESSION['login_user']['picture_path'];?>"> 
                            <?php }else {?>
                            <img class="img-thumbnail"  align="left" alt="140x140" src="profile_image/<?php echo $chat['picture_path'];?>"> <?php } ?>
                        <br><?php echo $chat['comment'];?></a>
                        <div class="media-body">
                          <span class="media-meta pull-right"><?php echo $chat['created'];?></span>
                          <h4 class="title">
                            <span class="pull-right recieve" ><?php if($chat['chat_user_id']==$_SESSION['login_user']['id']){
                    echo '<font color="#5cb85c">送信</font>';
                  }else{
                    echo '<font color="#FF9900">受信</font>';
                  } ?></span>
                          </h4>
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

