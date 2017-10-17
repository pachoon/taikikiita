<?php 

session_start();

   $dsn = 'mysql:dbname=cebty;host=localhost';
   $user = 'root';
   $password = '';
   $dbh = new PDO($dsn, $user, $password);
   $dbh->query('SET NAMES utf8');

    if(!isset($_SESSION['login_user']['id'])){
    //セッションデータを保持しているかチェック
    //セッションデータがなければログインページへ飛ばす
        header('Location: login.php');
        exit();
    }

    // if(!isset($_GET['id'])){
    //   header('Location: timeline.php');
    //   exit();
    // }

    $sql  = "SELECT * FROM `cebty_items` WHERE `id` =? ";
    $data = array($_GET['item_id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);//object型でexecuteを実行している
    //表示用の配列を用意
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    // $item_name = '';
    // $price = '';
    // $limited_date = '';
    // $item_detail = '';
    // $dealing_area = '';
    // $daling_date = '';
    // $category = '';


    if(!empty($_POST)){

      echo 'POST送信しました<br>';
      $item_name = $_POST['item_name'];
      $price = $_POST['price'];
      $limited_date = $_POST['limited_date'];
      $item_detail = $_POST['item_detail'];
      $dealing_area = $_POST['dealing_area'];
      $daling_date = $_POST['daling_date'];
      $category = $_POST['category'];

      $erros = array();
      if($item_name == '' ){
        $errors['item_name'] = 'blank';
      }
      if($price == '' ){
        $errors['price'] = 'blank';
      }
        if($limited_date == '' ){
          $errors['limited_date'] = 'blank';
        }
        if($item_detail == '' ){
          $errors['item_detail'] = 'blank';
        }
        if($dealing_area == '' ){
          $errors['dealing_area'] = 'blank';
        }
        if($daling_date == '' ){
          $errors['daling_date'] = 'blank';
        }
        if($category == '' ){
          $errors['category'] = 'blank';
        }

        $fileName = $_FILES['itempc_path']['name'];
        if(!empty($fileName)){
         $ext = substr($fileName,-3);
         $ext = strtolower($ext);
         if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
             $errors['itempc_path'] = 'extension';
         }
        
    }
    
    if (empty($errors)){
             $fileName=$_GET['item_id']."__".$fileName;

          // unlink('profile_image/'.$_SESSION['login_user']['picture_path']);
             move_uploaded_file($_FILES['itempc_path']['tmp_name'], 'itempic/'.$fileName);
    
         // データを一時的に保存する
             $_SESSION['item_info']['item_name'] = $item_name;
             $_SESSION['item_info']['itempc_path'] = $fileName;
             $_SESSION['item_info']['price'] = $price;
             $_SESSION['item_info']['limited_date'] = $limited_date;
             $_SESSION['item_info']['item_detail'] = $item_detail;
             $_SESSION['item_info']['dealing_area'] = $dealing_area;
             $_SESSION['item_info']['daling_date'] = $daling_date;
             $_SESSION['item_info']['category'] = $category;

             // POST送信を破棄する
             header('Location: edit_putup_change_confirm.php?item_id='.$_GET['item_id'].'');
             exit();
        }

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
  <title>商品登録</title>
</head>
<body>

<!-- <?php

// if(isset($_SESSION['login_user'])){

//   require('parts/login_header.php');

// }else{

//   require('parts/header.php');
// }

 ?> -->

<!-- <?php //require('parts/assets.php') ?> -->

<!-- <section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg2.jpg); "> -->


    <div class="container" style="padding-top:50px;">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 well">
          <h2 class="text-center">商品編集</h2>
            <div class="devider"></div>
              <form action="" method="post" class="form" role="form" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xs-12 col-md-12">
                    <h5>題名</h5>
                      <input class="form-control" name="item_name" type="text" value="<?php echo $item['item_name']; ?> "
                            required autofocus style="height:28px; font-size:12px;"/>
                    <!-- 商品画像１ -->
                    <h5>商品画像</h5>
                      <input type="file" name="itempc_path" accept="image/*" value="<?php echo $item['itempc_path']; ?> ">
                    <h5>価格</h5>
                      <input class="form-control" name="price" value="<?php echo $item['price']; ?> " type="numper" style="height:28px; font-size:12px;"/>
                    <h5>掲載期限</h5>
                      <input class="form-control" name="limited_date" type="date" value="<?php echo $item['limited_date']; ?>" style="height:28px; font-size:12px;"/>
                    <h5>コメント</h5>
                      <textarea class="form-control" name="item_detail" required type="text" style="height:80px;font-size:12px;"/><?php echo $item['item_detail']; ?></textarea>
                    <h5>地域</h5>
                      <select class="form-control" required name="dealing_area" value="<?php echo $item['dealing_area']; ?>" style="height:28px; font-size:12px;">
                        <option><?php echo $item['dealing_area']; ?></option>
                        <option>アヤラ</option>
                        <option>ITパーク</option>
                        <option>マクタン</option>
                        <option>タランバン</option>
                        <option>その他</option>
                      </select>
                    <h5>取引可能日</h5>
                      <input class="form-control" name="daling_date" value="<?php echo $item['daling_date']; ?>" type="date" style="height:28px; font-size:12px;"/>
                      以降<br><br>
                    <h5>カテゴリ</h5>
                      <select class="form-control" required name="category" value="<?php echo $item['category']; ?> " style="height:28px; font-size:12px;">
                      <option><?php echo $item['category']; ?></option>
                      <option>家電</option>
                      <option>衣服</option>
                      <option>食料品</option>
                      <option>薬</option>
                      <option>その他</option>
                    </select><br>
                      <button class="btn btn-md btn-primary btn-block" type="submit">
                      確認画面へ</button>
                  </form><br>
                      <a href="javascript:history.back()" class="btn btn-warning btn-block">出品管理画面へ戻る</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

            <footer class="text-off-white">


                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                       
                    </div>
                </div>

            </footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


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