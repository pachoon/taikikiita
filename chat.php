<!-- 仮です -->
<?php
if(isset($_GET[‘comment’])){
$comment = $_GET[‘comment’];
echo $comment;
}
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

    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <script type="text/javascript" src="chat.js"></script>
<title>チャット</title>
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
<body>
  <div class="container" style="padding-top: 130px">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 frame">
        <table id="edit_putup" class="table">
          <thead>
            <tr>
              <th>商品名</th>
              <th>出品者</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
                <td><img src="img/slider-bg.jpg" style="width:150px;"></td>
                <td>taro.kirameki@example.com</td>
            </tr>
            <tr>
              <th scope="row">2</th>
                <td>煌木 次郎</td>
                <td>jiro.kirameki@example.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- chat bigin-->
  <div class="container" style="padding-top: 230px">
    <div class="row">
      <div class="chat_window" >
        <div class="top_menu">
          <div class="buttons">
            <div class="button close"></div>
            <div class="button minimize"></div>
            <div class="button maximize"></div>
          </div>
          <div class="title">Chat</div>
        </div>
        <ul class="messages"></ul>
          <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
              <input class="message_input" placeholder="Type your message here..." />
            </div>
            <div class="send_message">
              <div class="icon"></div>
              <div class="text">Send</div>
            </div>
          </div>
      </div>
      <div class="message_template">
        <li class="message">
          <div class="avatar"></div>
          <div class="text_wrapper">
            <div class="text"></div>
          </div>
        </li>
      </div>
    </div>
  </div>
  <!-- chat end -->
</body>
</html>