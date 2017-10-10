<!-- 仮です -->
<?php  
   session_start();

    $dsn = 'mysql:dbname=cebty;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

   //  if(!isset($_SESSION['login_user']['id'])){
   // //セッションデータを保持しているかチェック
   // //セッションデータがなければ、ログインページに飛ばす。
   //   header('Location:login.php');
   //   exit();
   // }

//    if(isset($_POST['tweet'])){
//           $tweet=$_POST['tweet'];

    $sql = "SELECT (*) FROM`cebty_items` WHERE 1";
    $data = array(); //?がない場合は空のままでOK
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data); 

    $items = $stmt->fetch(PDO::FETCH_ASSOC);

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

  <!-- ========= END HEADER =========-->
  <!--========== BEGIN HEADER ==========-->
  <div class="container" style="padding-top: 130px;" align="center">
    
    <div class="row">
      <h2 id="product-h2">商品管理</h2>
      <div class="devider"></div>
    </div>
    <div style="text-align: center; padding-top: 50px;">
        <button type="button" class="btn btn-default btn-lg" style=" background-color: #f95481;">新規出品</button>
    </div>
  </div>
      

        <?php foreach ($items as $item) { ?>
          <div style="margin-bottom: 15px;">
            <?php echo $tweet['username']; ?><br>
            <img src="profile_image/<?php echo $tweet['picture_path']; ?>" width="40px">
            <span style="font-size: 17px;"><?php echo $tweet['tweet']; ?></span><br>
            <a href="view.php?id=<?php echo $tweet['id']; ?>">
            <?php echo "ツイート日時:".$tweet['created']; ?></a><br>
            <br>
        <?php } ?>
      

</body>
</html>