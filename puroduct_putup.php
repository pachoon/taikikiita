<?php 

// session_start();


//     $item_name = '';
//     $itempic_path = '';
//     $itempic_path2 = '';
//     $itempic_path3 = '';
//     $price = '';
//     $limited_date = '';
//     $item_detail = '';
//     $dealing_area = '';
//     $daling_date = '';
//     $category = '';


//     if(!empty($_POST)){


//     $item_name = $_POST['item_name'];
//     $itempic_path = $_POST['itempic_path'];
//     $itempic_path2 = $_POST['itempic_path2'];
//     $itempic_path3 = $_POST['itempic_path3'];
//     $price = $_POST['price'];
//     $limited_date = $_POST['limited_date'];
//     $item_detail = $_POST['item_detail'];
//     $dealing_area = $_POST['dealing_area'];
//     $daling_date = $_POST['daling_date'];
//     $category = $_POST['category'];


//     $erros = array();

//     if($item_name == '' ){
//         $errors['item_name'] = 'blank';
//     }
//     if($itempic_path == '' ){
//         $errors['itempic_path'] = 'blank';
//     }
//     if($itempic_path2 == '' ){
//         $errors['itempic_path2'] = 'blank';
//     }
//     if($itempic_path3 == '' ){
//         $errors['itempic_path3'] = 'blank';
//     }
//     if($price == '' ){
//         $errors['price'] = 'blank';
//     }
//     if($limited_date == '' ){
//         $errors['limited_date'] = 'blank';
//     }
//     if($item_detail == '' ){
//         $errors['item_detail'] = 'blank';
//     }
//     if($dealing_area == '' ){
//         $errors['dealing_area'] = 'blank';
//     }
//     if($daling_date == '' ){
//         $errors['daling_date'] = 'blank';
//     }
//     if($category == '' ){
//         $errors['category'] = 'blank';
//     }

//    $fileNameOne = $_FILES['itempic_path']['name'];

//    if(!empty($fileNameOne)){
//         $ext = substr($fileNameOne,-3);
//         $ext = strtolower($ext);
//         if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
//             $errors['itempic_path'] = 'extension';
//         }
//         }
//     if (empty($errors)){
//         move_uploaded_file($_FILES['itempic_path']['tmp_name'], 'profile_image/'.$fileNameOne);

//    $fileNameTwo = $_FILES['itempic_path2']['name'];

//    if(!empty($fileNameTwo)){
//         $ext = substr($fileNameTwo,-3);
//         $ext = strtolower($ext);
//         if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
//             $errors['itempic_path2'] = 'extension';
//         }
//         }
//     if (empty($errors)){
//         move_uploaded_file($_FILES['itempic_path2']['tmp_name'], 'profile_image/'.$fileNameTwo);

//    $fileNameThree = $_FILES['itempic_path3']['name'];

//    if(!empty($fileNameThree)){
//         $ext = substr($fileNameThree,-3);
//         $ext = strtolower($ext);
//         if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
//             $errors['itempic_path3'] = 'extension';
//         }
//         }
//     if (empty($errors)){
//         move_uploaded_file($_FILES['itempic_path3']['tmp_name'], 'profile_image/'.$fileNameThree);



//         // check.phpへリダイレクト
//         // $_SESSEION スーパーグローバル変数
//         // データを一時的に保存する
//         $_SESSION['user_info']['item_name'] = $item_name;
//         $_SESSION['user_info']['itempic_path'] = $itempic_path;
//         $_SESSION['user_info']['itempic_path2'] = $itempic_path2;
//         $_SESSION['user_info']['itempic_path3'] = $itempic_path3;
//         $_SESSION['user_info']['price'] = $price;
//         $_SESSION['user_info']['limited_date'] = $limited_date;
//         $_SESSION['user_info']['item_detail'] = $item_detail;
//         $_SESSION['user_info']['dealing_area'] = $dealing_area;
//         $_SESSION['user_info']['daling_date'] = $daling_date;
//         $_SESSION['user_info']['category'] = $category;


//         // POST送信を破棄する
//         header('Location: confirm_signup.php');
//         exit();
//     }
//   }

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


<?php

if(isset($_SESSION['login_user'])){

  require('parts/login_header.php');

}else{

  require('parts/header.php');
}

 ?>

<!-- <?php require('parts/assets.php') ?> -->

<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg2.jpg); ">


    <div class="container" style="padding-top:130px;">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 well">
                <h2 class="text-center">商品登録</h2>
                <div class="devider"></div>
                <form action="#" method="post" class="form" role="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <h5>題名</h5>
                        <input class="form-control" name="item_name" placeholder="例：冷蔵庫　1000ペソ！" type="text"
                            required autofocus style="height:28px; font-size:12px;"/>
                    </div>
                    <!-- 商品画像１ -->
                    <h5>商品画像</h5>
                <label for="file_photo" required style="color: white;background-color: crimson;padding: 6px;border-radius: 6px; cursor:pointer;font-size:12px;">
                  商品画像を選択
                    <input type="file" id="file_photo" name="profile_image_path" accept="image/*" required style="display:none" >
                </label>
                <div class="preview" style="padding-bottom:7px;"></div>
                    <!-- 商品画像２ -->
                <label for="file_photo" required style="color: white;background-color: crimson;padding: 6px;border-radius: 6px; cursor:pointer;font-size:12px;">
                  商品画像を選択
                    <input type="file" id="file_photo" name="profile_image_path" accept="image/*" required style="display:none" >
                </label>
                <div class="preview" style="padding-bottom:7px;"></div>
                    <!-- 商品画像３ -->
                <label for="file_photo" required style="color: white;background-color: crimson;padding: 6px;border-radius: 6px; cursor:pointer;font-size:12px;">
                  商品画像を選択
                    <input type="file" id="file_photo" name="profile_image_path" accept="image/*" required style="display:none" >
                </label>
                <div class="preview" style="padding-bottom:7px;"></div>

                </div>
                <h5>価格</h5>
                <input class="form-control" name="price" placeholder="例：1000" type="numper" style="height:28px; font-size:12px;"/>
                <h5>掲載期限</h5>
                <input class="form-control" name="limited_date" type="date" style="height:28px; font-size:12px;"/>
                <h5>コメント</h5>
                <textarea class="form-control" name="item_detail" placeholder="コメント" required type="text" style="height:80px;font-size:12px;"/></textarea>
                <h5>地域</h5>
                <select class="form-control" required name="dealing_area" style="height:28px; font-size:12px;">
                  <option disabled="--地域を選択してください--">--地域を選択してください--</option>
                  <option>アヤラ</option>
                  <option>ITパーク</option>
                  <option>マクタン</option>
                  <option>タランバン</option>
                  <option>その他</option>
                </select>
                <h5>取引可能日</h5>
                <input class="form-control" name="daling_date" type="date" style="height:28px; font-size:12px;"/>
                以降
                
                <br><br>
                <h5>カテゴリ</h5>
                <select class="form-control" required name="category" style="height:28px; font-size:12px;">
                  <option disabled="--カテゴリを選択してください--">--カテゴリを選択してください--</option>
                  <option>家電</option>
                  <option>衣服</option>
                  <option>食料品</option>
                  <option>薬</option>
                  <option>その他</option>
                </select>

                

                




                <button class="btn btn-md btn-primary btn-block" type="submit">
                    確認画面へ</button>
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