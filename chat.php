<!-- 仮です -->
<?php  
  session_start();

     if(!isset($_SESSION['login_user']['id'])){
  //セッションデータを保持しているかチェック
  //セッションデータがなければ、ログインページに飛ばす。
    header('Location:login.php');
    exit();
   }

  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');


  $sql = 'SELECT * FROM `cebty_items` WHERE `id` = ?';
  $data = array($_GET['item_id']);
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);

  $item = $stmt->fetch(PDO::FETCH_ASSOC);



  $sql = 'SELECT `cebty_items`.*, `cebty_users`.*
          FROM `cebty_items`
          LEFT JOIN `cebty_users`
          ON `cebty_items`.`user_id` = `cebty_users`.`id`
          WHERE `cebty_items`.`user_id`=?';

  $data = array($_GET['user_id']); //?がない場合は空のままでOK
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);

  $other = $stmt->fetch(PDO::FETCH_ASSOC);



  $sql = "SELECT `cebty_chat`.*,`cebty_items`.`id`
          FROM `cebty_chat`
          LEFT JOIN `cebty_items`
          ON `cebty_chat`.`item_id` = `cebty_items`.`id`
          WHERE `cebty_chat`.`item_id`=?
          AND ( `cebty_chat`.`user_id` =?
          OR `cebty_chat`.`other_id` =?)
          ORDER BY `cebty_chat`.`created` DESC" ;
  $data = array($_GET['item_id'],$_SESSION['login_user']['id'],$_SESSION['login_user']['id']);
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


  $sql = 'SELECT * FROM `cebty_users` WHERE `id` = ?';
  $data = array($_GET['user_id']);
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);


  $otherinfo = $stmt->fetch(PDO::FETCH_ASSOC);
  $other_name = $otherinfo['username'];
  $other_pc_path = $otherinfo['picture_path'];


  $user_id=$_SESSION['login_user']['id'];
  $other_id=$other['user_id'];
  $item_id=$item['id'];
  $comment=$_POST['comment'];
  $vendor=0;



  if (!empty($_POST)) {


        $sql = 'INSERT INTO `cebty_chat` SET `user_id`=? ,
                                             `other_id`=? ,
                                             `other_name`=? ,
                                             `other_pc_path`=? ,
                                             `item_id`=? ,
                                             `comment`=? ,
                                             `vendor`=? ,
                                             `created`=NOW()';
        $data = array($user_id,$other_id,$other_name,$other_pc_path,$item_id,$comment,$vendor);
        $stmt = $dbh->prepare($sql);
        $stmt ->execute($data);

        header('Location:chat.php?item_id='.$_GET['item_id'].'&user_id='.$_GET['user_id'].'&login_id='.$_GET['login_id'].'');
        exit();


 }



?>


<!-- 仮でした。 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="セブティ, Cebty" />
    <meta name="author" content="">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'> <!-- Body font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'> <!-- Navbar font -->

    <!-- Libs and Plugins CSS -->
    <link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/animations/css/animate.min.css">
    <link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- Skin CSS -->
    <!-- <link rel="stylesheet" href="css/skin/cool-gray.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/ice-blue.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/summer-orange.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/fresh-lime.css"> -->
    <link rel="stylesheet" href="css/skin/night-purple.css">

    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <script type="text/javascript" src="chat.js"></script>
<title>チャット</title>
</head>
<body>
  <?php 

    if(isset($_SESSION['login_user'])){
      require('parts/login_header.php');
    }
    else{
      require('parts/header.php');
    }
  ?>

  <div class="container" style="padding-top: 130px">
    <div class="row" style="text-align: center;">
      <div class="col-md-offset-2 col-md-4">
        <h2 class="chat">商品</h2>
        <div class="devider"></div>
      </div>
      <div class="col-md-4">
        <?php if($user_id = $item['id']){ ?>
          <h2 class="chat">投稿者</h2>
        <?php }else{ ?>
          <h2 class="chat">問合せ</h2>
        <?php } ?>
        <div class="devider"></div>
      </div>
    </div>
    <div class="row" style="height: 120px; text-align: center; vertical-align: middle;">
      <div class="col-md-offset-2 col-md-2">
        <div class="chat-box1">
          <img src="itempic/<?php echo $item['itempc_path'];?>" width="120px">
        </div>
      </div>
      <div class="col-md-2">
        <div class="chat-box2">
          <h4> <a href="product.php?item_id=<?php echo $item['id']; ?>">
              <?php echo $item['item_name']; ?></a></h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="chat-box1">
          <img src="profile_image/<?php echo $otherinfo['picture_path'];?>" width="120px">
        </div>
      </div>
      <div class="col-md-2">
        <div class="chat-box2">
          <h4><a href="user_information.php?user_id=<?php echo $other['id']; ?>">
              <?php echo $other['username']; ?></a></h4>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <!-- chat bigin-->
  <div class="container">
    <div class="row">
      <section class="content">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="POST" action="">
              <textarea name="comment" style="width:80%;"  rows="4" cols="40" placeholder="新規メッセージを入力してください"></textarea>
              <input type="submit" value="送信" style="margin-bottom:25px; margin-left:5px;" class="btn btn-primary">
            </form>
            
                <div class="table-container" style="overflow-x:scroll; height: 400px;">
                  <table class="table table-filter">
                  <?php foreach ($chats as $chat) {?>
                    <tbody>
                      <tr data-status="send">
                        <td>

                          <div class="chatComment" style="width: 570px;">
                            <!-- <a href="#" class="pull-left"> -->
                            <?php if($chat['user_id']==$_SESSION['login_user']['id']) { ?>
                              <img src="profile_image/<?php echo $_SESSION['login_user']['picture_path'];?>" class="chatComment-photo">
                              <!-- </a> -->
                              <div class="chatComment-body" style="width: 570px;">
                               <!-- <span class="media-meta pull-right"></span> -->
                                <?php echo $chat['created'];?>
                                <h4 class="title">
                                <?php echo $_SESSION['login_user']['username'];?>
                                </h4>
                                <p class="summary"><?php echo $chat['comment'];?></p>
                              </div>
                            <?php }else{ ?>
                              <img src="profile_image/<?php echo $other['picture_path'];?>" class="chatComment-photo">
                              <!-- </a> -->
                              <div class="chatComment-body" style="width: 570px;">
                                 <!-- <span class="media-meta pull-right"></span> -->
                                <?php echo $chat['created'];?>
                                <h4 class="title">
                                  <?php echo $other['username'];?>
                                </h4>
                                <p class="summary"><?php echo $chat['comment'];?></p>
                              </div>
                            <?php } ?>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    <?php } ?>
                  </table>
                </div>
          
        </section>
      </div>
    </div>



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

  $('#ta').height(30);//init
  $('#ta').css('lineHeight','20px');//init

  $('#ta').on('input',function(evt){
    if(evt.target.scrollHeight > evt.target.offsetHeight){   
        $(evt.target).height(evt.target.scrollHeight);
    }else{          
        var lineHeight = Number($(evt.target).css('lineHeight').split('px')[0]);
        while (true){
            $(evt.target).height($(evt.target).height() - lineHeight); 
            if(evt.target.scrollHeight > evt.target.offsetHeight){
                $(evt.target).height(evt.target.scrollHeight);
                break;
            }
        }
    }
  });
</script>
  <!-- chat end -->
</body>
</html>