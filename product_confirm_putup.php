<?php 


  session_start();


  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');



    //一度も入力せずに飛んだ人は登録画面へ飛ばす。
  if(!isset($_SESSION['login_user']['id'])){
    //セッションデータを保持しているかチェック
    //セッションデータがなければログインページへ飛ばす
    header('Location: login.php');
    exit();
  }

  if(!empty($_POST)){



      $item_name = $_SESSION['item_info']['item_name'];
      $itempc_path = $_SESSION['item_info']['itempc_path'];
      $price = $_SESSION['item_info']['price'];
      $limited_date = $_SESSION['item_info']['limited_date'];
      $item_detail = $_SESSION['item_info']['item_detail'];
      $dealing_area = $_SESSION['item_info']['dealing_area'];
      $daling_date = $_SESSION['item_info']['daling_date'];
      $category = $_SESSION['item_info']['category'];


        if($_SESSION['item_info']['price'] <= 99){
      $priceLabel = 1;}elseif($_SESSION['item_info']['price'] >= 100 && $_SESSION['item_info']['price'] <= 499){$priceLabel = 2;}elseif($_SESSION['item_info']['price'] >=500 && $_SESSION['item_info']['price'] <= 999){$priceLabel = 3;}elseif($_SESSION['item_info']['price'] >= 1000){$priceLabel = 4;}


      //INSERT処理
      $sql = 'INSERT INTO `cebty_items` SET `user_id`=?,
                                            `item_name`=?,
                                            `itempc_path`=?,
                                            `price`=?,
                                            `price_label`=?,
                                            `limited_date`=?,
                                            `item_detail`=?,
                                            `dealing_area`=?,
                                            `daling_date`=?,
                                            `category`=?,
                                            `created`=NOW()';


      $data = array($_SESSION['login_user']['id'],$item_name,$itempc_path,$price,$priceLabel,$limited_date,$item_detail,$dealing_area,$daling_date,$category);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);

       header('Location: edit_putup.php?login_user_id='.$_SESSION['login_user']['id'].'');
       exit();

  }




 ?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/animations/css/animate.min.css">
    <link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">
  <meta charset="utf-8">
  <title>登録内容確認</title>
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

<?php require('parts/assets.php') ?>



<!-- <section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg2.jpg); "> -->


<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 well">
            <h5 class="text-center">登録内容確認<?php var_dump($_POST);?></h5>
            <div class="devider"></div>
            <form action="" method="POST" class="form" role="form">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                  <p style="padding-bottom:1px;">題名： 　<?php echo $_SESSION['item_info']['item_name']; ?></p>
                </div>
            </div>
            <p style="padding-bottom:1px;">商品画像：</p>
            <img src="itempic/<?php echo $_SESSION['item_info']['itempc_path'];?>" width="150">
            <div class="preview" style="padding-bottom:7px;"></div>

            <p style="padding-bottom:1px;">価格：　<?php echo $_SESSION['item_info']['price'];?> ペソ</p>
            <p style="padding-bottom:1px;">掲載期限：　<?php echo $_SESSION['item_info']['limited_date'];?> </p>
            <p style="padding-bottom:1px;">コメント：　<?php echo $_SESSION['item_info']['item_detail']; ?></p>
            <p style="padding-bottom:1px;">エリア：　<?php echo $_SESSION['item_info']['dealing_area'];?> </p>
            <p style="padding-bottom:1px;">取引可能日：　<?php echo $_SESSION['item_info']['daling_date']; ?>以降</p>
            <p style="padding-bottom:1px;">カテゴリ：　<?php echo $_SESSION['item_info']['category']; ?></p>

            <div class="row">
               <div class="col-sm-6 col-md-6">
                <input type="hidden" name="newitem" value="newitem">
                <button href="" class="btn btn-primary btn-block" type="newitem">登録する</button><br><br>
                 
               </div>
               <div class="col-sm-6 col-md-6">
               <a href="javascript:history.back()" class="btn btn-md btn-danger btn-block">修正する</a>
               </div>
            </div>

            </form>
        </div>
    </div>
</div>



</section>

            <footer class="text-off-white">


                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                       
                    </div>
                </div>

            </footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>

$(function(){
  //画像ファイルプレビュー表示のイベント追加 fileを選択時に発火するイベントを登録
  $('form').on('change', 'input[type="file"]', function(e) {
    var file = e.target.files[0],
        reader = new FileReader(),
        $preview = $(".preview");
        t = this;

    // 画像ファイル以外の場合は何もしない
    if(file.type.indexOf("image") < 0){
      return false;
    }

    // ファイル読み込みが完了した際のイベント登録
    reader.onload = (function(file) {
      return function(e) {
        //既存のプレビューを削除
        $preview.empty();
        // .prevewの領域の中にロードした画像を表示するimageタグを追加
        $preview.append($('<img style="padding-top:5px;">').attr({
                  src: e.target.result,
                  width: "150px",
                  class: "preview",
                  title: file.name
              }));
      };
    })(file);

    reader.readAsDataURL(file);
  });
});


</script>



    <script src="inc/jquery/jquery-1.11.1.min.js"></script>
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="inc/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="inc/stellar/js/jquery.stellar.min.js"></script>
    <script src="inc/animations/js/wow.min.js"></script>
    <script src="inc/waypoints.min.js"></script>
    <script src="inc/isotope.pkgd.min.js"></script>
    <script src="inc/classie.js"></script>
    <script src="inc/jquery.easing.min.js"></script>
    <script src="inc/jquery.counterup.min.js"></script>
    <script src="inc/smoothscroll.js"></script>

</body>
</html>