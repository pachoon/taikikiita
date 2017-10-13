<!-- 仮です -->
<?php  
   session_start();

    $dsn = 'mysql:dbname=cebty;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

     if(!isset($_SESSION['login_user']['id'])){
    //セッションデータを保持しているかチェック
    //セッションデータがなければ、ログインページに飛ばす。
      header('Location:login.php');
      exit();
     }

//    if(isset($_POST['tweet'])){
//           $tweet=$_POST['tweet'];

    

?>
<?php 

$sql  = "SELECT * FROM `cebty_items` WHERE `user_id` =? ";
$data = array($_GET['login_user_id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);//object型でexecuteを実行している

//表示用の配列を用意
$items = array();
while (true) {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  // echo $record['username'];
  // echo "<br>"
  if (!$record){
    break;
  }
  $items[]=$record;
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
        <!-- aiが追加 -->
        <link rel="stylesheet" href="css/edit_putup.css">
        <!-- aiが追加　終わり -->
  <title>出品管理</title>
</head>

<body>
  <!--========== BEGIN HEADER ==========-->
<?php 

if(isset($_SESSION['login_user'])){
  require('parts/login_header.php');
}
else{
  require('parts/header.php');
}
 ?>


  <div class="container" style="padding-top: 130px;" align="center">
    
    <div class="row">
      <h2 id="product-h2">商品管理</h2>
      <div class="devider"></div>
    </div>
    <div style="text-align: center; padding-top: 50px;">
      <a href="puroduct_putup.php" class="btn btn-success btn-lg">新規出品</a>
    </div>
  </div>
  <div class="container"  >
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="text-align: center;">商品写真</th>
          <th style="text-align: center;">題名</th>
          <th style="text-align: center;">価格</th>
          <th style="text-align: center;">引渡可能日</th>
          <th style="text-align: center;">エリア</th>
          <th style="text-align: center;">カテゴリ</th>
          <th style="text-align: center;">コメント</th>
          <th style="text-align: center;">掲載期限</th>
          <th style="text-align: center;">管理</th>
        </tr>
      </thead>
        <?php foreach ($items as $item) { ?>
          <div style="margin-bottom: 15px;">
            <tbody>
            <tr style="vertical-align: middle;">
              <td style="vertical-align: middle;"><img src="itempic/<?php echo $item['itempc_path']; ?>" width="100px"></td>
              <td style="vertical-align: middle;"><a href="product.php?item_id=<?php echo $item['id']; ?>">
              <strong></strong> <?php echo $item['item_name']; ?></a></td>
              <td style="vertical-align: middle;">
                <span style="font-size: 17px;"><?php echo $item['price'].'ペソ'; ?></span><br></td>
              <td style="vertical-align: middle;">
                <span style="font-size: 17px;"><?php echo $item['limited_date']; ?></span><br></td>
              <td style="vertical-align: middle;">
                <span style="font-size: 17px;"><?php echo $item['dealing_area']; ?></span><br></td>
              <td style="vertical-align: middle;">
                <span style="font-size: 17px;"><?php echo $item['category']; ?></span><br></td>
              <td style="vertical-align: middle;">
                <span style="font-size: 17px;"><?php echo $item['item_detail']; ?></span><br></td>
              <td style="vertical-align: middle;">
                <span style="font-size: 17px;"><?php echo $item['daling_date']; ?></span><br></td>
              <td style="vertical-align: middle;">
                <a href="edit_putup_change.php?item_id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">編集</a><br><br>
                <a href="product_delete.php?item_id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">削除</a></td>
              <br><br>
            </tr>
          </div>
          </tbody>
          <?php } ?>
        </div>
      
    </table>
  

  <!-- <footer class="text-off-white">
    <div class="footer">
      <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
        <p class="copyright">Copyright &copy; 2017 - Designed By <a href="" class="theme-author">TaikiKiita</a> &amp; Developed by <a href="" class="theme-author">NagamiTaiki</a></p>
      </div>
    </div>
  </footer>
            <!- End footer -->
  <!-- <a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> --> <!-- Scroll to top button -->
       
      

</body>
</html>