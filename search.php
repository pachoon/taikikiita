<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>商品検索</title>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>

<script src="js/search.js"></script>


<?php

session_start();
$startPrice='9999';
$startArea='9999';
$startFreeword='';

if(isset($_SESSION['login_user']['username'])){

require('parts/login_header.php');

}else{

require('parts/header.php');

}


  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');



  if($_POST['price']=='9999'){
    $a = "!";}else{ $a = '';}

  if($_POST['area']=='9999'){
    $b = '!' ;} else { $b = '';}



if(!empty($_POST['freeword']) || !empty($_POST['price']) || !empty($_POST['area'])){

$startPrice=$_POST['price'];
$startArea=$_POST['area'];
$startFreeword=$_POST['freeword'];



    $sql = 'SELECT * FROM `cebty_items` WHERE (`item_name` LIKE "%'.$_POST['freeword'].'%"
                                              OR `item_detail` LIKE "%'.$_POST['freeword'].'%")
                                                               AND `price_label ` '.$a.'= ?
                                                               AND `dealing_area` '.$b.'= ?';
    $data = array($_POST['price'], $_POST['area']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

  $products=array();

while(true){
  $record = $stmt->fetch(PDO::FETCH_ASSOC);

  if(!$record){
     break;
  }


  $products[]=$record;
}

}elseif(!empty($_GET['freeword']) || !empty($_GET['price']) || !empty($_GET['area'])){


    $sql = 'SELECT * FROM `cebty_items` WHERE (`item_name` LIKE "%'.$_GET['freeword'].'%"
                                              OR `item_detail` LIKE "%'.$_GET['freeword'].'%")
                                                               AND `price_label` '.$a.'= ?
                                                               AND `dealing_area` '.$b.'= ?';
    $data = array($_GET['price'], $_GET['area']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

  $products=array();

while(true){
  $record = $stmt->fetch(PDO::FETCH_ASSOC);

  if(!$record){
     break;
  }


  $products[]=$record;

}


}else{

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
}









 ?>

                                    <div class="portfolio_menu" id="filters" style="padding-top:80px;">
                                        <ul>
                                            <li class="active_prot_menu"><a href="#porfolio_menu" data-filter="*">すべて</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".elec">家電</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".cloth" >衣服</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".food">食料品</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".medecine">薬</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".others">その他</a></li>
                                        </ul>
                                    </div>


  <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for Slides -->
        <div class="carousel-buttons">
  <div class="search" >
        <div class="container">
          <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
              <div class="form-section">
                <div class="row">
                    <form role="form" method="POST" action="">
                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                             <div class="serchtile">価格</div>
                          <label class="sr-only" for="looking">価格</label>
                         <select id="selectbasic" name="price" class="form-control">
                              <?php if($startPrice=="9999"){ ?>
                              <option value="9999" selected>全て</option>
                              <?php }else{ ?>
                              <option value="9999">全て</option>
                              <?php } ?>

                              <?php if($startPrice=="1"){ ?>
                              <option value="1" selected>100ペソ以下</option>
                              <?php }else{ ?>
                              <option value="1">100ペソ以下</option>
                              <?php } ?>

                              <?php if($startPrice=="2"){ ?>
                              <option value="2" selected>100-500ペソ以下</option>
                              <?php }else{ ?>
                              <option value="2">100-500ペソ以下</option>
                              <?php } ?>

                              <?php if($startPrice=="3"){ ?>
                              <option value="3" selected>500-1000ペソ以下</option>
                              <?php }else{ ?>
                              <option value="3">500-1000ペソ以下</option>
                              <?php } ?>

                              <?php if($startPrice=="4"){ ?>
                              <option value="4" selected>1000ペソ以上</option>
                              <?php }else{ ?>
                              <option value="4">1000ペソ以上</option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                         <div class="serchtile">エリア</div>
                          <label class="sr-only" for="area">エリア</label>
                          <div class="input-group">
                            <select id="age" name="area" class="form-control">
                              <?php if($startArea=="9999"){ ?>
                              <option value="9999" selected>全て</option>
                              <?php }else{ ?>
                              <option value="9999">全て</option>
                              <?php } ?>
                              <?php if($startArea=="ITパーク"){ ?>
                              <option value="ITパーク" selected>ITパーク</option>
                              <?php }else{ ?>
                              <option value="ITパーク">ITパーク</option>
                              <?php } ?>
                              <?php if($startArea=="アヤラ"){ ?>
                              <option value="アヤラ" selected>アヤラ</option>
                              <?php }else{ ?>
                              <option value="アヤラ">アヤラ</option>
                              <?php } ?>
                              <?php if($startArea=="マンダウエ"){ ?>
                              <option value="マンダウエ" selected>マンダウエ</option>
                              <?php }else{ ?>
                              <option value="マンダウエ">マンダウエ</option>
                              <?php } ?>
                              <?php if($startArea=="マクタン島"){ ?>
                              <option value="マクタン島" selected>マクタン島</option>
                              <?php }else{ ?>
                              <option value="マクタン島">マクタン島</option>
                              <?php } ?>
                            </select>
                         </div>
                        </div>
                      </div>
                          


                      <div class="col-sm-4 col-md-4">
                          
                        <div class="form-group">
                            <div class="serchtile">フリーワード</div>
                          <label class="sr-only" for="religion">フリーワード</label>
                          <input type="text" id="religion" name="freeword" class="form-control" value="<?php echo $startFreeword; ?>">
                        </div>
                      </div>

                      <div class="col-sm-2 col-md-2">
                          <br>
                           <div class="serchtile"></div>
                        <button type="submit" class="btn btn-default btn-primary btn-block">検索</button>
                   
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       
        </div>



    </header>  


<div class="devider"></div>



<div class="portfolio_content" id="portfolio">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">

        <?php foreach($products as $product){ ?>

<?php
  $sql='SELECT * FROM `cebty_favorite` where `user_id` =? and `items_id` = ?';

  $data = array($_SESSION['login_user']['id'], $product['id']);
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);
  $favorite = $stmt->fetch(PDO::FETCH_ASSOC);
?>


            <div class="col-md-3 col-sm-4 <?php echo $product['category']; ?> " id="<?php echo $product['id'];?>">
                <div class="view">
                    <div class="caption">
                        <h3>　　　　　</h3>

<?php if(!$favorite){ ?>
                        <a href="fav.php?item_id=<?php echo $product['id']; ?>&price=<?php echo $startPrice; ?>&area=<?php echo $startArea; ?>&freeword=<?php echo $startFreeword; ?>&like" rel="tooltip" title="お気に入り"><span class="fa fa-heart-o fa-2x"></span></a>
<?php }elseif($favorite){ ?>
                        <a href="fav.php?item_id=<?php echo $product['id']; ?>&price=<?php echo $startPrice; ?>&area=<?php echo $startArea; ?>&freeword=<?php echo $startFreeword; ?>&unlike" rel="tooltip" title="お気に入り解除"><span class="fa fa-heart fa-2x"></span></a>
<?php } ?>
                        <a href="product.php?item_id=<?php echo $product['id']; ?>" rel="tooltip" title="商品詳細"><span class="fa fa-search fa-2x"></span></a>
                    </div>
                    <img src="itempc_path/<?php echo $product['itempc_path'];  ?>" class="img-responsive">
                     <div class="propertyType <?php if($product['dealing_area']=='ITパーク'){echo 'it';}elseif($product['dealing_area']=='アヤラ'){echo 'ayala';}elseif($product['dealing_area']=='マンダウエ'){echo 'mandaue';}elseif($product['dealing_area']=='マクタン島'){echo 'makutan';} ?>" style="line-height: 20px;"><?php echo $product['dealing_area']; ?></div>

                </div>
                <div class="info">
                    <p class="small" style="text-overflow: ellipsis"><?php echo $product['item_name']; ?></p>
                    <p class="small wb-red">受渡し可能日：<?php echo $product['daling_date']; ?></p>
                </div>
                <div class="stats wb-red-bg text-center">
                    <span class="fa fa-rub" rel="tooltip" title="価格：<?php echo $product['price']; ?>ペソ"> <strong> <?php echo $product['price']; ?></strong></span>
                </div>
            </div>
        <?php }  ?>

        </div>
    </div>
</div>
</div>


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

<br><br><br>
<?php require('parts/footer.php') ?>

</body>
</html>