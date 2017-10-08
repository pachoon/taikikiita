<!-- 仮です -->
<?php
// if(isset($_GET[‘comment’])){
// $comment = $_GET[‘comment’];
// echo $comment;
// }


?>
<!-- 仮でした。 -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cebty</title>
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
  <!--========== BEGIN HEADER ==========-->
  <div class="container" style="padding-top: 130px;" align="center">
    <div class="row">
      <div class="col-md-3">
        <button type="button" class="btn btn-default btn-lg " style=" background-color: #7e75b3; ">出品管理</button>
      </div>
      <div class="col-md-6"></div>
      <div class="col-md-3">
        <button type="button" class="btn btn-default btn-lg" style=" background-color: #f95481;">新規出品</button>
      </div>
    </div>

          <?php foreach ($items as $item) { ?>
            <div style="margin-bottom: 15px;">
              <?php echo $items['username']; ?><br>
              <img src="profile_image/<?php echo $tweet['picture_path'];?>" width="40px">
              <span style="font-size: 17px"><?php echo $tweet['tweet']; ?></span>
              <br>
              <a href="view.php?id=<?php echo $tweet['id']; ?>"><?php echo "ツイート日時:" . $tweet['created']; ?></a><br>
              
<?php } ?>

    <div class="container" style="padding-top: 50px;" align="center">
      <table id="edit_putup" class="table table-responsive">
        <thead>
          <tr>
            <th>画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>引渡可能日</th>
            <th>コメント</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr >
            <th scope="row"><img src="img/slider-bg.jpg" style="width:150px;"></th>
              <td ><input type = “text” name =“itemname/“></td>
              <td><input type = “number” name =“price/“>
                <select name="men">
                  <option value="1">ペソ</option>
                  <option value="2">円</option>
                </select></td>
              <td><input type="text" id="datepicker"></td>
              <td><textarea name="comment" cols="30" rows="5"></textarea><br /></td>

              <td><button type="submit" class="btn btn-danger">登録</button><br><br>
                  <button type="submit" class="btn btn-danger">削除</button></td>
          </tr>
        </tbody>


      </table>
      

    </div>

  </div>

</body>
</html>