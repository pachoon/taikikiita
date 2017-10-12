<?php 

  session_start();
  require('dbconnect.php');

  // ログインチェック
if(!isset($_SESSION['login_user']['id'])){
    header('Location: login.php');
    exit();
}



// $sql = "SELECT * FROM `cebty_favorite`" ;


$sql='SELECT * FROM `cebty_favorite` WHERE `user_id`=?';

$data = array($_SESSION['login_user']['id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

$favorites=array();
while(true){
$record = $stmt->fetch(PDO::FETCH_ASSOC);
//$recordはデータベースのカラム値をkeyとする連想配列で構成されます.(データベースから１件取ってきます)
if(!$record){
   break;
}
$favorites[]=$record;
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">

  <link rel="stylesheet" href="css/style.css">  
  <link href="css/favorite.css" rel="stylesheet" />
  <meta charset="utf-8">

  <title>お気に入り</title>
</head>
<body>
<?php

if(isset($_SESSION['login_user'])){

  require('parts/login_header.php');

}else{

  require('parts/header.php');
}

 ?>
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
<?php if(isset($_GET['delete']) && isset($_GET['content'])){ ?>
    <div class="alert alert-success text-center">
      「<?php echo $_GET['content']; ?>」という商品を削除しました。
    </div>
<?php } ?>
<h1 class="section-header"><span class="content-header wow fadeIn  animated" data-wow-delay="0.2s" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeIn; font-family: 'Oleo Script', cursive;"> お気に入り</span></h1>
        <br>
        <br>
        <br>
        <br>
<!--    <div class="container">
    <div class="col-xs-12">
        <div class="portfolio_content">
        <div class="row"  id="portfolio">
            <div class="col-xs-12 col-sm-4 elec">
                <div class="portfolio_single_content">
                    <img src="img/portfolio/h1.jpg" alt="title"/>
                    <div>
                        <a href="#">掃除機＊ほぼ新品です！</a>
                        <ul>
                            <li><span>価格：６０ペソ</span></li>
                            <li><span>引渡し可能日：10月28日〜</span></li>
                        </ul>
                         <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                    </div>
                </div>
            </div> -->

                                <?php for ($i=0; $i < count($favorites); $i++) { ?>
                                    <div class="portfolio_content">
                                        <div class="row"  id="portfolio">
                                            <div class="col-xs-12 col-sm-4 elec">
                                                <div class="portfolio_single_content">
                                                    <a href="<?php echo $favorites[$i]['item_id'];?>"><img src="profile_image/<?php echo $favorites[$i]['itempic_path'];?>" alt="title"></a>
                                                    <div>
                                                         <?php echo $favorites[$i]['item_name']; ?>
                                                        <ul>
                                                          <?php if($_SESSION['login_user']['id']==$favorites[$i]['user_id']){ ?>
                                                                            <a href="favorite_delete.php?id=<?php echo $favorites['id']; ?>" class="btn btn-danger btn-xs">削除
                                                                             </a>
 <li><button type="button"><a href="favorite_delete.php?id=<?php echo $favorites[$i]['id']; ?>"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                                                                        <?php } ?>







                                                            <li><span> <?php echo $favorites[$i]['price']; ?></span></li>
                                                            <li><span><?php echo $favorites[$i]['daling_data']; ?></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                <?php } ?>
  </div>
    </div>
  </div>
</body>
  <?php require('parts/footer.php'); ?>
<?php require('parts/assets.php') ?>
</html>

