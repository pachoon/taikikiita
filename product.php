<!-- 仮です -->

<?php
   session_start();



   $dsn = 'mysql:dbname=cebty;host=localhost';
   $user = 'root';
   $password = '';
   $dbh = new PDO($dsn, $user, $password);
   $dbh->query('SET NAMES utf8');



   $sql = "SELECT `cebty_items`.*, `cebty_users`.`username`,`cebty_users`.`picture_path`
           FROM `cebty_items`
           LEFT JOIN `cebty_users`
           ON `cebty_items`.`user_id` = `cebty_users`.`id`
           WHERE `cebty_items`.`id`=? ";
   $data = array($_GET['item_id']); //?がない場合は空のままでOK
   $stmt = $dbh->prepare($sql);
   $stmt->execute($data); 

   $item = $stmt->fetch(PDO::FETCH_ASSOC);

   //  $sql = "SELECT * FROM `cebty_deals` WHERE `item_id`=? ";
   // $data = array($_GET['item_id']); //?がない場合は空のままでOK
   // $stmt = $dbh->prepare($sql);
   // $stmt->execute($data); 

   // $deal = $stmt->fetch(PDO::FETCH_ASSOC);

// リクエスト機能
   if(isset($_POST['request']) && $_POST['request'] == 'request'){
        //リクエストを押した時はここの処理が走る
        echo 'リクエスト';
        $sql = 'INSERT INTO `cebty_deals` SET `item_id`=? ,
                                              `user_id`=?
        ';
        $data = array($_POST['item_id'],$_SESSION['login_user']['id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }elseif(isset($_POST['request']) && $_POST['request'] == 'unrequest'){
        //いいね取り消しを押した場合、ここの処理が走る
        $sql = 'DELETE FROM `cebty_deals` WHERE `item_id`=?
                                             AND `user_id`=?
        ';
        $data = array($_POST['item_id'],$_SESSION['login_user']['id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }
    if(isset($_POST['request'])){
        // いいね、またはいいね取り消しを押した場合は、ここの処理が走る
        // $_POSTの情報を破棄。
        header('Location: product.php?item_id=' . $_POST['item_id']);
        exit();
    }

// いいね機能
    if(isset($_POST['favorite']) && $_POST['favorite'] == 'favorite'){
        //いいねを押した時はここの処理が走る
        echo 'いいね';
        $sql = 'INSERT INTO `cebty_favorite` SET `items_id`=? ,
                                                 `user_id`=?
        ';
        $data = array($_POST['items_id'],$_SESSION['login_user']['id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

    }elseif(isset($_POST['favorite']) && $_POST['favorite'] == 'unfavorite'){
        //いいね取り消しを押した場合、ここの処理が走る
        $sql = 'DELETE FROM `cebty_favorite` WHERE `items_id`=?
                                             AND `user_id`=?
        ';
        $data = array($_POST['items_id'],$_SESSION['login_user']['id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }

    if(isset($_POST['favorite'])){
        // いいね、またはいいね取り消しを押した場合は、ここの処理が走る
        // $_POSTの情報を破棄。
        header('Location: product.php?item_id=' . $_POST['items_id']);
        exit();
    }


    $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_deals` WHERE `item_id` = ?';
    $data = array($item['id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $deal_chk = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_favorite` WHERE `items_id` = ?';
    $data = array($item['id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $favorite = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_favorite` WHERE `items_id` = ? AND `user_id` = ?';
    $data = array($item['id'],$_SESSION['login_user']['id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $favorite_chk = $stmt->fetch(PDO::FETCH_ASSOC);


   $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_deals` WHERE `item_id` = ?';
   $data = array($item['id']);
   $stmt = $dbh->prepare($sql);
   $stmt->execute($data);

   $deal_chk = $stmt->fetch(PDO::FETCH_ASSOC);

            // var_dump($likes_chk['count']);


//   $tweets = array();
//     while (true) {
//     $record = $stmt->fetch(PDO::FETCH_ASSOC);
//     // $recordはデータベースのカラム値をkeyとする、
//     // 連想配列で構成されます。（データベースから1件とってきます）
//     // echo $record['username'];
//     // echo "<br>";
//     if (!$record){
//         break;
//     }
//     $tweets[]=$record;
// }

 ?>



<!-- 仮でした。 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品詳細</title>
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
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- Skin CSS -->
    <!-- <link rel="stylesheet" href="css/skin/cool-gray.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/ice-blue.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/summer-orange.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/fresh-lime.css"> -->
    <link rel="stylesheet" href="css/skin/night-purple.css">


    

<title>商品情報</title>
</head>


<body>
  <?php if(isset($_SESSION['login_user'])){
          require('parts/login_header.php');
        }else{
          require('parts/header.php');
        } ?>
  <div class="wrap" style="background: url(img/slider-bg.jpg) no-repeat; background-size: cover; background-attachment: fixed; height: 1000px;">
    <div class="background" style=" height: 100%;
  background: rgba(255,255,255,0.8);">
      <div class="container" style="margin-top: 0px; height: 600px; text-align: center;">
        <div class="row" >
          <h2 id="product-h2" style="padding-bottom:0px; margin-top: 100px;"><?php echo $item['item_name'];?></h2>
          <?php if($deal_chk['count'] != 0){ ?>
                  <div id="btn-request">受付終了しました</div>
          <?php } ?>
          <div class="devider" style="margin-bottom:20px;"></div>
        </div>
        <!-- productPicture -->
        <div class="row">
          <div class="col-md-6" style="text-align: center;">
            <?php if($deal_chk['count'] == 0) { ?>
              <img src="itempic/<?php echo $item['itempc_path'];?>" width="500px" height="400px" class="box11">
            <?php }else{ ?>
              <div id="frame16">
                <img src="itempic/<?php echo $item['itempc_path'];?>" width="500px" height="400px" class="box11">
              </div>
            <?php } ?>
          </div>


<style type="text/css">

.box11{
    padding: 0.5em 1em;
    margin: 2em 0;
    color: #5d627b;
    background: white;
    border-top: solid 2px #5d627b;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
}
.box11 p {
    margin: 0; 
    padding: 0;
}

</style>



        <!-- productPictureEnd -->
        <div class="col-md-6 col-sm-6 col-sm-offset-2" style="text-align: left;">
          <p class="item-detail"><strong>価格</strong>&emsp;&emsp;&emsp;&emsp;:&emsp;<?php echo $item['price'] ?>ペソ</p><br>
          <p class="item-detail"><strong>引渡可能日</strong>&emsp;:&emsp;<?php echo $item['daling_date'] ?></p><br>
          <p class="item-detail"><strong>エリア</strong>&emsp;&emsp;&emsp;:&emsp;<?php echo $item['dealing_area'] ?></p><br>
          <p class="item-detail"><strong>カテゴリ</strong>&emsp;&emsp;:&emsp;<?php echo $item['category'] ?></p><br>
          <p class="item-detail" style="display: inline-block;"><strong>掲載期限</strong>&emsp;&emsp;:&emsp;<?php echo $item['limited_date'] ?></p><br><br>
          <div style="width: 500px; height: 200px; position: relative; top: 5px; left: 0px;">
            <div style="width: 150px; height: 100%; position: absolute; top: 15px; left: 0px;">
              <p class="item-detail" ><strong>コメント</strong>&emsp;&emsp;:&emsp;</p>
            </div>
            <div style="width: 350px; height: 100%; position: absolute; top: 15px; left: 150px;">
              <p class="item-detail" style="font-size: 18px;"><?php echo $item['item_detail'] ?></p><br>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
          <p class="item-detail"  style="color: #867ad8; text-align: center; border: solid 1px;"><?php echo $favorite['count'];?>人 がお気に入り登録中</p><br><br>
        </div>
      </div>
      </div>
      <div class="container" style="text-align: center;">
        <div class="row">
          <div class="col-md-6">
               <!-- 受付終了を表示 -->
               <?php 

               if(isset($_SESSION['login_user'])){


                $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_deals` WHERE `item_id` = ?';
                $data = array($item['id']);
                $stmt = $dbh->prepare($sql);
                $stmt->execute($data);

                $request = $stmt->fetch(PDO::FETCH_ASSOC);

                // 自分が受付終了ボタンを押しているかどうかをチェック
                $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_deals` WHERE `item_id` = ?
                                                                      AND   `user_id` = ?
                                                                                        ';
                $data = array($item['id'],$_SESSION['login_user']['id']);
                $stmt = $dbh->prepare($sql);
                $stmt->execute($data);

                $request_chk = $stmt->fetch(PDO::FETCH_ASSOC);

              }
                ?>
            <?php if(isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] == $item['user_id'] ){ ?>
              <form method="POST" action=""><br>
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <?php if($request_chk['count'] == 0){ ?>
                  <input type="hidden" name="request" value="request">
                  <input type="submit" value="受付を終了する" class="btn btn-danger btn-lg">
                <?php }else{ ?>
                  <input type="hidden" name="request" value="unrequest">
                  <input type="submit" value="受付を再開する" class="btn btn-warning btn-lg">
                <?php } ?><br><br>
              </form>
              <a href="edit_putup.php?login_user_id=<?php echo $_SESSION['login_user']['id']?>" style="margin-bottom:30px; " class="btn btn-md btn-success btn-lg">商品管理ページに戻る</a>
            <?php } ?>
             <!-- お気に入りを表示 -->
            
            <!-- お気に入りボタン設置 -->
             <?php 
              // ログインしてるかどうかをチェック
              if (isset($_SESSION['login_user']['id']) && ($_SESSION['login_user']['id'] != $item['user_id'] )){ ?>
                 
                  <form method="POST" action=""><br>
                    <input type="hidden" name="items_id" value="<?php echo $item['id']; ?>">
                    <!-- ここのif文で10回いいね！、しないと取り消しが出現しないようにしている -->
                    <?php if($favorite_chk['count'] == 0){ ?>
                      <input type="hidden" name="favorite" value="favorite">
                      <input type="submit" value="お気に入り！" class="btn btn-primary btn-lg">
                    <?php }else{ ?>
                      <input type="hidden" name="favorite" value="unfavorite">
                      <input type="submit" value="お気に入り！取消" class="btn btn-warning btn-lg">
                    <?php } ?><br><br>
                  </form>

                  <a href="chat.php?<?php echo 'item_id='.$item['id'].'&'.'user_id='.$item['user_id'].'&'.'login_id='.$_SESSION['login_user']['id'].'&'.'other_id='.$item['user_id']; ?>" class="btn btn-info btn-lg" style="margin-bottom:30px; " >
                    出品者へ問い合わせ</a>
                <?php } ?>
          </div>
          <div class="col-md-6">
            <div id="box16" style="margin:0px; margin-bottom:20px" >
              <p style="text-align: center; font-size:20px; padding-bottom:10px">出品者</p>
                <div style="display: -webkit-flex; display: flex; -webkit-align-items: center; -webkit-justify-content: center;">
                  <img src="profile_image/<?php echo $item['picture_path']; ?>" width="150px" class="img-thumbnail">
                  &emsp;&emsp;&emsp;
                  <a href="user_information.php?user_id=<?php echo $item['user_id']; ?>" style="font-size:35px; line-height:60px;">
                    <?php echo $item['username']?></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




<script type="text/javascript">
              $(document).ready(function() {
              $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
              });
            </script>
<script type="text/javascript" src="product.js"></script>
</body>
</html>