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
   $data = array($_GET['id']); //?がない場合は空のままでOK
   $stmt = $dbh->prepare($sql);
   $stmt->execute($data); 

   $item = $stmt->fetch(PDO::FETCH_ASSOC);

// リクエスト機能
   if(isset($_POST['request']) && $_POST['request'] == 'request'){
        //いいねを押した時はここの処理が走る
        echo 'リクエスト';
        $sql = 'INSERT INTO `cebty_deals` SET `items_id`=? ,
                                              `user_id`=?,
                                              `buyrequest`=?
        ';
        $data = array($_POST['items_id'],$_SESSION['login_user']['id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }
    if(isset($_POST['request'])){
        // いいね、またはいいね取り消しを押した場合は、ここの処理が走る
        // $_POSTの情報を破棄。
        header('Location: product.php?id=' . $_POST['items_id']);
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
        header('Location: product.php?id=' . $_POST['items_id']);
        exit();
    }






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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- Skin CSS -->
    <!-- <link rel="stylesheet" href="css/skin/cool-gray.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/ice-blue.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/summer-orange.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/fresh-lime.css"> -->
    <link rel="stylesheet" href="css/skin/night-purple.css">

    <link rel="stylesheet" href="css/product.css">
    

<title>商品情報</title>
</head>





  <!-- ========= END HEADER =========-->
<body>
<?php 

if(isset($_SESSION['login_user'])){
  require('parts/login_header.php');
}
else{
  require('parts/header.php');
}
 ?>



              <div class="container" style="margin-top: 150px; height: 600px; ">
        <div class="row">
          <h2 id="product-h2"><?php echo $item['item_name'];?></h2>
          <div class="devider"></div>
        </div>
        <!-- productPicture -->
        <div class="row">
            <div class=" col-md-6" style="text-align: center;">
            <img src="itempic/<?php echo $item['itempic_path']; ?>" width="400px" >
            </div>
        
            <!-- productPictureEnd -->
        <div class="col-md-6">
          <p class="item-detail">価格 : <?php echo $item['price'] ?>ペソ</p>
          <br>
          <p class="item-detail">引渡可能日 : <?php echo $item['daling_date'] ?></p>
          <br>
          <p class="item-detail">エリア : <?php echo $item['dealing_area'] ?></p>
          <br>
          <p class="item-detail">カテゴリ : <?php echo $item['category'] ?></p>
          <br>
          <p class="item-detail">コメント : </p>
          <p class="item-detail"><?php echo $item['item_detail'] ?></p>
          <br>
          <p class="item-detail">掲載期限 : <?php echo $item['limited_date'] ?></p>
          <br>
          
          <br>
        </div>
      </div>

    <div class="container" style="text-align: center;">
      <div class="row">
        <div class="col-md-6">
        <br>

                <?php 
                  // 購入リクエストを表示
                  $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_deals` WHERE `item_id` = ?';
                  $data = array($item['id']);
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute($data);
                  // 1件文のデータを取得
                  $request = $stmt->fetch(PDO::FETCH_ASSOC);

                  // 自分がいいね！を一回以上しているかどうかをチェック
                  $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_deals` WHERE `item_id` = ?
                                                                        AND   `user_id` = ?

                                                                          ';
                  $data = array($item['id'],$_SESSION['login_user']['id']);
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute($data);
                  // 1件文のデータを取得
                  $request_chk = $stmt->fetch(PDO::FETCH_ASSOC);

                  ?>

          <form method="POST" action="">
                <br>
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <!-- ここのif文で10回いいね！、しないと取り消しが出現しないようにしている -->
                <?php if($request_chk['count'] == 0){ ?>
                    <input type="hidden" name="request" value="request">
                    <input type="submit" value="購入リクエスト" class="btn btn-danger btn-lg">
                <?php }else{ ?>
                      <input type="hidden" name="favorite" value="unrequest">
                      <input type="submit" value="購入リクエスト！済" class="btn btn-danger btn-lg">
                <?php } ?>
                <br><br>
                
              </form>


              <?php 
                  // いいねのカウントを表示
                  $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_favorite` WHERE `items_id` = ?';
                  $data = array($item['id']);
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute($data);
                  // 1件文のデータを取得
                  $favorite = $stmt->fetch(PDO::FETCH_ASSOC);

                  // 自分がいいね！を一回以上しているかどうかをチェック
                  $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_favorite` WHERE `items_id` = ? AND `user_id` = ?';
                  $data = array($item['id'],$_SESSION['login_user']['id']);
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute($data);
                  // 1件文のデータを取得
                  $favorite_chk = $stmt->fetch(PDO::FETCH_ASSOC);

                  // var_dump($likes_chk['count']);
              ?>
<!-- いいね！ボタン設置 -->
              <form method="POST" action="">
                <br>
                <input type="hidden" name="items_id" value="<?php echo $item['id']; ?>">
                <!-- ここのif文で10回いいね！、しないと取り消しが出現しないようにしている -->
                <?php if($favorite_chk['count'] == 0){ ?>
                    <input type="hidden" name="favorite" value="favorite">
                    <input type="submit" value="お気に入り！" class="btn btn-primary btn-lg">
                <?php }else{ ?>
                      <input type="hidden" name="favorite" value="unfavorite">
                      <input type="submit" value="お気に入り！取り消し" class="btn btn-warning btn-lg">
                <?php } ?>
                <br><br>
                いいね！数:<?php echo $favorite['count'];?>
              </form>


          <br>
          <a href="product.php" class="btn btn-info btn-lg" >出品者へ問合せ</a>
          
        </div>
        <p style="text-align: center;">出品者</p>
        <div class="col-md-2">
          <img src="profile_image/<?php echo $_SESSION['picture_path']; ?>" width="50px">
        </div>
        <div>
          <a href=""><?php echo $_SESSION['cebty_user']['username']?></a>
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