<?php

session_start();
// $startPrice='9999';
  require('dbconnect.php');

if(isset($_SESSION['login_user']['username'])){

require('parts/login_header.php');

}else{

require('parts/header.php');

}

  // ログインチェック
if(!isset($_SESSION['login_user']['id'])){
    header('Location: login.php');
    exit();
}

//   if($_POST['price']=='9999'){
//     $a = "!";}else{ $a = '';}

//   if($_POST['area']=='9999'){
//     $b = '!' ;} else { $b = '';}



// if(!empty($_POST['freeword']) || !empty($_POST['price']) || !empty($_POST['area'])){

// $startPrice=$_POST['price'];



//     $sql = 'SELECT * FROM `cebty_favorite` WHERE (`item_name` LIKE "%'.$_POST['freeword'].'%"
//                                               OR `item_detail` LIKE "%'.$_POST['freeword'].'%")
//                                                                AND `price_label ` '.$a.'= ?
//                                                                AND `dealing_area` '.$b.'= ?';
//     $data = array($_POST['price'], $_POST['area']);
//     $stmt = $dbh->prepare($sql);
//     $stmt->execute($data);

//   $products=array();

// while(true){
//   $record = $stmt->fetch(PDO::FETCH_ASSOC);

//   if(!$record){
//      break;
//   }


//   $products[]=$record;
// }

// } else {

//     $sql = "SELECT * FROM `cebty_favorite` " ;
//     $data = array();
//     $stmt = $dbh->prepare($sql);
//     $stmt->execute($data);


// // 表示用の配列を用意

// while(true){
//   $record = $stmt->fetch(PDO::FETCH_ASSOC);
//   //$recordはデータベースのカラム値をkeyとする連想配列で構成されます.(データベースから１件取ってきます)


//   if(!$record){
//      break;
//   }
//   $products[]=$record;
// }
// }

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
<?php require('parts/assets.php') ?>
  
  <link rel="stylesheet" href="css/style.css">  
  <link href="css/search.css" rel="stylesheet" />

  <meta charset="utf-8">

  <title>お気に入り</title>
</head>
<body>


<div class="section-content" style="height:265px">
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
        <h1 class="section-header" style="text-align:center;"><span class="content-header wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s" style="font-size: 45px;" align="center">お気に入り</span></h1>
        <div class="devider"></div>

        <br>
        <br>
        <br>
        <br>

  </div>



<div class="portfolio_content" id="portfolio" style="margin-top:0px;">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">

        <?php for ($i=0; $i < count($favorites); $i++) { ?>


            <div class="col-md-3 col-sm-4 ">
                <div class="view">
                    <div class="caption">
                    </div>
                    <a href="product.php?item_id=<?php echo $favorites[$i]['items_id']; ?>"><img src="itempic/<?php echo $favorites[$i]['itempic_path'];?>" class="img-responsive"></a>
                </div>
                <div class="info">
                    <p class="small" style="text-overflow: ellipsis"><?php echo $favorites[$i]['item_name']; ?></p>
                    <p class="small wb-red">受渡し可能日：<?php echo $favorites[$i]['dealing_date']; ?></p>
                </div>
                <div class="stats wb-red-bg text-center">
                    <span class="fa fa-rub" rel="tooltip" title="価格：<?php echo $favorites[$i]['price']; ?>ペソ"> <strong> <?php echo $favorites[$i]['price']; ?></strong></span>
                    <button type="button"><a href="favorite_delete.php?id=<?php echo $favorites[$i]['id']; ?>"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button>
                </div>
            </div>
        <?php }  ?>

        </div>
    </div>
</div>
</div>




<br><br><br>
<?php require('parts/footer.php') ?>

</body>


</html>

