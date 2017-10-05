<?php 

  session_start();
  require('dbconnect.php');

  // ログインチェック
if(!isset($_SESSION['login_user']['id'])){
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
 <?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">  
  <link href="css/favorite.css" rel="stylesheet" />
  <meta charset="utf-8">

  <title>お気に入り</title>
</head>
<body>
<?php require('parts/header.php'); ?>
<div class="section-content">
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
<?php if(isset($_GET['delete'])){ ?>
    <div class="alert alert-success text-center">
      「<?php echo $_GET['content']; ?>」という商品を削除しました。
    </div>
<?php } ?>
<h1 class="section-header"><span class="content-header wow fadeIn  animated" data-wow-delay="0.2s" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeIn;"> お気に入り商品</span></h1>
        <br>
        <br>
        <br>
        <br>
  <!-- <div class="container">
    <div class="col-xs-12">
        <div class="portfolio_content">
        <div class="row"  id="portfolio">
            <div class="col-xs-12 col-sm-4 elec">
                <div class="portfolio_single_content">
                    <img src="img/portfolio/h1.jpg" alt="title"/>
                    <div>
                        <a href="#">掃除機＊ほぼ新品です！</a>
                        <ul>
                            <li><span>価格：６０ペソ</span></li>
                            <li><span>引渡し可能日：10月28日〜</span></li>
                        </ul>
                         <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
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
                            <li><span>引渡し可能日：10月1日〜</span></li>
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 elec">
                <div class="portfolio_single_content">
                    <img src="img/portfolio/h9.jpg" alt="title"/>
                    <div>
                        <a href="#">ドライヤー</a>
                        <ul>
                            <li><span>価格：１００ペソ</span></li>
                            <li><span>引渡し可能日：即日</span></li>
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
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
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
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
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
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
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 cloth">
                <div class="portfolio_single_content">
                    <img src="img/portfolio/h7.jpg" alt="title"/>
                    <div>
                        <a href="#">水着女性用＊１度しか使ってません</a>
                        <ul>
                            <li><span>価格：２０ペソ</span></li>
                            <li><span>引渡し可能日：9月28日〜</span></li>
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 others">
                <div class="portfolio_single_content">
                    <img src="img/portfolio/h8.jpg" alt="title"/>
                    <div>
                        <a href="#">車売ってますーー</a>
                        <ul>
                            <li><span>価格：１５０ペソ</span></li>
                            <li><span>引渡し可能日：8月28日〜</span></li>
                            <li><button type="button"><a href="############"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
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
                            <li><button type="button"><a href="?delete=on&content=自転車とても快適なやつ"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<?php 

$sql='SELECT `item_name`,`price`,`dealing_date` ,``FROM `cebty_favorite`';
$data = array();
$stmt = $dbh->prepare($sql);
$stmt->execute($data);




$favorites = array();
    while (true) {
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$record){
        break;
    }
    $favorites[]=$record;
}
  ?>

<?php 
    foreach ($favorites as $favorite) {?>
        <div class="row"  id="portfolio">
            <div class="col-xs-12 col-sm-4 elec">
                <div class="portfolio_single_content">
                    <img src="img/portfolio/h1.jpg<?php echo $favorite['itempic_path'];?> " alt="title"/>
                    <div>
                        <a href="#"> <?php echo $favorite['username']; ?></a>
                        <ul>
                            <li><span>引渡し可能日：即日ちょ</span></li>
                            <li><button type="button"><a href="favorite_delete.php"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
    <?php } ?>


    <div>
        <a href="mypage.php"><button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  マイページへ</button></a> 
    </div>
  </div>
    </div>
  </div>
  <?php require('parts/footer.php'); ?>
</body>
</html>

