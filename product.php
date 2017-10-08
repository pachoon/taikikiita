<!-- 仮です -->
<?php 
   session_start();

   $dsn = 'mysql:dbname=cebty;host=localhost';
   $user = 'root';
   $password = '';
   $dbh = new PDO($dsn, $user, $password);
   $dbh->query('SET NAMES utf8');

   $errors = array();
   if(!empty($_POST)){
     //POST送信があった全てがここの中に入る

     if(isset($_POST['favorit']) && $_POST['favorit'] == 'favorit'){
         //いいねを押した時はここの処理が走る
         echo 'いいね';
         $sql = 'INSERT INTO `cebty_favorit` SET `items_id`=? ,
                                                 `user_id`=?
         ';
         $data = array($_POST['items_id'],$_SESSION['login_user']['id']);
         $stmt = $dbh->prepare($sql);
         $stmt->execute($data);
     }elseif(isset($_POST['favorit']) && $_POST['favorit'] == 'unlike'){
         //いいね取り消しを押した場合、ここの処理が走る
         $sql = 'DELETE FROM `cebty_favorit` WHERE `items_id`=?
                                             AND `user_id`=?
         ';
         $data = array($_POST['items_id'],$_SESSION['login_user']['id']);
         $stmt = $dbh->prepare($sql);
         $stmt->execute($data);

     }

  //   if(isset($_POST['likes'])){
  //       // いいね、またはいいね取り消しを押した場合は、ここの処理が走る
  //       // $_POSTの情報を破棄。
  //       header('Location: timeline.php');
  //       exit();
  //   }


        $item = $_SESSION['items_id'];

   }

  $sql = "SELECT `cebty_items`.*, `cebty_users`.`username`,`cebty_users`.`picture_path`
          FROM `cebty_users`
          LEFT JOIN `cebty_items`
          ON `cebty_items`.`user_id` = `cebty_users`.`id`
          WHERE 1 ";

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

<body>
  <!--========== BEGIN HEADER ==========-->
  <header id="header" class="header-main">
  <!-- Begin Navbar -->
    <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation"> <!-- Classes: navbar-default, navbar-inverse, navbar-fixed-top, navbar-fixed-bottom, navbar-transparent. Note: If you use non-transparent navbar, set "height: 98px;" to #header -->
      <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                    </button>
                      <a class="navbar-brand page-scroll" href="index.html">Cebty</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="" href="">ホーム</a></li>
                <li><a class="" href="">マイページ</a></li>
                  <li><a class="" href="">商品検索</a></li>
                    <li><a class="" href="">チャット</a></li>
                      <li><a class="" href="">お問合せ</a></li>
                        <li><a class="" href="">ログイン</a></li>
                        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
                <!-- End Navbar -->
  </header>
  <!-- ========= END HEADER =========-->
<body>
              <div class="container" style="margin-top: 150px;">
        <div class="row">
          <h2 id="product-h2"><?php echo $_SESSION['item_name'] ?> </h2>
          <div class="devider"></div>
        </div>
        <!-- productPicture -->


        <div class="row">
            <div class=" col-md-6">
            <img src="profile_image/<?php echo $_SESSION['picture_path']; ?>" width="50px">
            <img src="profile_image/<?php echo $_SESSION['picture_path']; ?>" width="50px">
            <img src="profile_image/<?php echo $_SESSION['picture_path']; ?>" width="50px">
            </div>
        
            <!-- productPictureEnd -->
        <div class="col-md-6">
          <p class="item-detail">価格 : <?php echo $_SESSION['price'] ?>ペソ</p>
          <br>
          <p class="item-detail">引渡可能日 : <?php echo $_SESSION['daling_date'] ?></p>
          <br>
          <p class="item-detail">エリア : <?php echo $_SESSION['dealing_area'] ?></p>
          <br>
          <p class="item-detail">カテゴリ : <?php echo $_SESSION['category'] ?></p>
          <br>
          <p class="item-detail">コメント : </p>
          <p class="item-detail"><?php echo $_SESSION['item_detail'] ?></p>
          <br>
          <p class="item-detail">掲載期限 : <?php echo $_SESSION['limited_date'] ?></p>
          <br>
          
          <br>
        </div>
      </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="product.php" class="btn btn-danger btn-lg">購入リクエスト</a> 

          <?php 
                  // いいねのカウントを表示
                  $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_favorite` WHERE `items_id` = ?';
                  $data = array();
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute($data);
                  // 1件文のデータを取得
                  $likes = $stmt->fetch(PDO::FETCH_ASSOC);

                  // 自分がいいね！を一回以上しているかどうかをチェック
                  $sql = 'SELECT COUNT(*) AS `count` FROM `cebty_favorite` WHERE `items_id` = ? AND `user_id` = ?';
                  $data = array($item['items_id'],$_SESSION['login_user']['id']);
                  $stmt = $dbh->prepare($sql);
                  $stmt->execute($data);
                  // 1件文のデータを取得
                  $likes_chk = $stmt->fetch(PDO::FETCH_ASSOC);

                   var_dump($likes_chk['count']);
              ?>

          <!-- お気に入りボタン -->
          <form method="POST" action="">
            <!-- いいね！数 <?php //echo $tweet['likes_count']; ?> -->
              <!-- <input type="hidden" name="_id" value="<?php //echo $tweet['id']; ?>"> -->
              <?php if ($likes_chk['count']==0) {?>
                <input type="hidden" name="likes" value="like">
                <input type="submit" value="お気に入り" class="btn btn-warning btn-lg">
              <?php }else{ ?>
                <input type="hidden" name="likes" value="unlike">
                <input type="submit" value="お気に入り　取消" class="btn btn-danger btn-xs">

              <?php } ?> 

               
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