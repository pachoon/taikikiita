<?php

session_start();

  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');


  //login状態かチェック
if(!isset($_SESSION['login_user']['id'])){
  //セッションデータを保持しているかチェック
  //セッションデータがなければログインページへ飛ばす
  header('Location: login.php');
  exit();
}





  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');




$sql = "SELECT * FROM `cebty_items` " ;
$data = array();
$stmt = $dbh->prepare($sql);
$stmt->execute($data);


// 表示用の配列を用意

while(true){
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  //$recordはデータベースのカラム値をkeyとする連想配列で構成されます.(データベースから１件取ってきます)


  if(!$record){
     break;
  }
  $products[]=$record;
}






 ?>


<!doctype html>

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

        <link rel="stylesheet" type="text/css" href="css/signup.css">

  </head>




    <body data-spy="scroll" data-target="#main-navbar">
        <div class="page-loader"></div>  <!-- Display loading image while page loads -->
      <div class="body">

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
                            <li><a class="" href="login_index.php">ようこそ、<?php echo $_SESSION['login_user']['username'];?>さん</a></li>
                            <li><a class="" href="mypage.php">マイページ</a></li>
                            <li><a class="" href="search.php">商品検索</a></li>
<<<<<<< HEAD
                            <li><a class="" href="chat_list.php">チャット</a></li>
=======
                            <li><a class="" href="">チャット</a></li>
>>>>>>> ai
                            <li><a class="" href="contact.php">お問合せ</a></li>
                            <li><a class="" href="logout.php">ログアウト</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
                </nav>
                <!-- End Navbar -->

            </header>
            <!-- ========= END HEADER =========-->



          <!-- Begin text carousel intro section -->
      <section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg.jpg);">

        <div class="container">
          <div class="caption text-center text-white" data-stellar-ratio="0.7">

            <div id="owl-intro-text" class="owl-carousel">
              <div class="item">
                            <img src="img/mainlogo.png">
                                <div class="extra-space-l"></div>
              </div>
            </div>

          </div> <!-- /.caption -->
        </div> <!-- /.container -->

      </section>
      <!-- End text carousel intro section -->



            <!-- Begin Portfolio -->
            <section id="portfolio-section" class="page bg-style1">
              <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio">
                                <!-- Begin page header-->
                                <div class="page-header-wrapper">
                                    <div class="container">
                                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                                            <h2>新着商品</h2>
                                            <div class="devider"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End page header-->
                                <div class="portfoloi_content_area" >
                                    <div class="portfolio_menu" id="filters">
                                        <ul>
                                            <li class="active_prot_menu"><a href="#porfolio_menu" data-filter="*">すべて</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".elec">家電</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".cloth" >衣服</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".food">食料品</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".medecine">薬</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".others">その他</a></li>
                                        </ul>
                                    </div>



                                <?php foreach($products as $product){ ?>
                                    <div class="portfolio_content">
                                        <div class="row"  id="portfolio">
                                            <div class="col-xs-12 col-sm-4 <?php echo $product['category']; ?>">
                                                <div class="portfolio_single_content">
                                                    <img src="itempc_path/<?php echo $product['itempc_path'];?> " alt="title"/>
                                                    <div>
                                                        <a href="#"> <?php echo $product['item_name']; ?></a>
                                                        <ul>
                                                            <li><span>価格：<?php echo $product['price']; ?></span></li>
                                                            <li><span>引き渡し可能日：<?php echo $product['daling_date'] ?></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                <?php } ?>








<!--                                     <div class="portfolio_content">
                                        <div class="row"  id="portfolio">
                                            <div class="col-xs-12 col-sm-4 elec">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h1.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">掃除機＊ほぼ新品です！</a>
                                                        <ul>
                                                            <li><span>価格：６０ペソ</span></li>
                                                            <li><span>引渡し可能日：即日</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 food">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h6.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">カップヌードル８個！</a>
                                                        <ul>
                                                            <li><span>価格：４５ペソ</span></li>
                                                            <li><span>引渡し可能日：即日</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 elec">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h9.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">ドライヤー状態良好</a>
                                                        <ul>
                                                            <li><span>価格：１００ペソ</span></li>
                                                            <li><span>引渡し可能日：10月1日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 cloth">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h4.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">ハンガー５個セット</a>
                                                        <ul>
                                                            <li><span>価格：１０ペソ</span></li>
                                                            <li><span>引渡し可能日：8月22日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 medecine">
                                                <div class="portfolio_single_content">
                                                    <img src="img//portfolio/h5.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">正露丸＊半分くらいあります</a>
                                                        <ul>
                                                            <li><span>価格：４０ペソ</span></li>
                                                            <li><span>引渡し可能日：10月2日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 elec">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h2.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">電子レンジ</a>
                                                        <ul>
                                                            <li><span>価格： １２０ペソ</span></li>
                                                            <li><span>引渡し可能日：10月28日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 cloth">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h7.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">水着女性用＊２回使いました</a>
                                                        <ul>
                                                            <li><span>価格：２０ペソ</span></li>
                                                            <li><span>引渡し可能日：10月28日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 others">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h8.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">車売ってますーー！！</a>
                                                        <ul>
                                                            <li><span>価格：１５０ペソ</span></li>
                                                            <li><span>引渡し可能日：8月28日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 others">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/h3.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">自転車とても快適なやつ</a>
                                                        <ul>
                                                            <li><span>価格：６０ペソ</span></li>
                                                            <li><span>引渡し可能日：10月8日〜</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End portfolio -->



            <!-- Begin footer -->
            <footer class="text-off-white">


                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                        <p class="copyright">Copyright &copy; 2017 - Designed By <a href="" class="theme-author">TaikiKiita</a> &amp; Developed by <a href="" class="theme-author">NagamiTaiki</a></p>
                    </div>
                </div>

            </footer>
            <!-- End footer -->

            <a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> <!-- Scroll to top button -->

        </div><!-- body ends -->




        <!-- Plugins JS -->
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

    <!-- Theme JS -->
    <script src="js/theme.js"></script>

    </body>

</html>
