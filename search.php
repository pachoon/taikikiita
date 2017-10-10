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

if(isset($_SESSION['login_user'])){

require('parts/login_header.php');

}else{

require('parts/header.php');

}

 ?>

                                    <div class="portfolio_menu" id="filters" style="padding-top:100px;">
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
  <div class="search">
        <div class="container">
          <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
              <div class="form-section">
                <div class="row">
                    <form role="form">
                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                             <div class="serchtile">価格</div>
                          <label class="sr-only" for="looking">価格</label>
                         <select id="selectbasic" name="selectbasic" class="form-control">
                              <option value="1">50ペソ以下</option>
                              <option value="2">50-200ペソ</option>
                              <option value="2">200-500ペソ</option>
                              <option value="2">500-1000ペソ</option>
                              <option value="2">1000ペソ以上</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                         <div class="serchtile">エリア</div>
                          <label class="sr-only" for="age">エリア</label>
                          <div class="input-group">
                            <select id="age" name="age" class="form-control">
                              <option value="18">ITパーク周辺</option>
                              <option value="19">アヤラセンター</option>
                              <option value="20">マンダウエシティ</option>
                              <option value="21">マクタン島</option>
                            </select>
                         </div>
                        </div>
                      </div>
                          


                      <div class="col-sm-4 col-md-4">
                          
                        <div class="form-group">
                            <div class="serchtile">フリーワード</div>
                          <label class="sr-only" for="religion">フリーワード</label>
                          <input type="text" id="religion" name="religion" class="form-control" name="">
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




<div class="devider" style="margin:0; margin-bottom:15px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-3 col-sm-4" >
                <div class="view">
                    <div class="caption">
                        <h3>　　　　　</h3>
                        <a href="" rel="tooltip" title="お気に入り"><span class="fa fa-heart-o fa-2x"></span></a>
                        <a href="" rel="tooltip" title="商品詳細"><span class="fa fa-search fa-2x"></span></a>
                    </div>
                    <img src="profile_image/image.e.jpg" class="img-responsive">
                    <div class="propertyType house" style="line-height: 20px;">ITパーク</div>
                </div>
                <div class="info">
                    <p class="small" style="text-overflow: ellipsis">商品名</p>
                    <p class="small wb-red">引き渡し可能日</p>
                </div>
                <div class="stats wb-red-bg text-center">
                    <span class="fa fa-rub" rel="tooltip" title="価格：６０ペソ"> <strong>１８０</strong></span>
                </div>
            </div>


            <div class="col-md-3 col-sm-4">
                <div class="view">
                    <div class="caption">
                        <h3>　　　　　</h3>
                        <a href="" rel="tooltip" title="お気に入り"><span class="fa fa-heart-o fa-2x"></span></a>
                        <a href="" rel="tooltip" title="商品詳細"><span class="fa fa-search fa-2x"></span></a>
                    </div>
                    <img src="profile_image/image.e.jpg" class="img-responsive">
                    <div class="propertyType unit" style="line-height: 20px;">ITパーク</div>
                </div>
                <div class="info">
                    <p class="small" style="text-overflow: ellipsis">商品名</p>
                    <p class="small wb-red">引き渡し可能日</p>
                </div>
                <div class="stats wb-red-bg text-center">
                    <span class="fa fa-rub" rel="tooltip" title="価格：６０ペソ"> <strong>１８０</strong></span>
                </div>
            </div>


                        <div class="col-md-3 col-sm-4">
                <div class="view">
                    <div class="caption">
                        <h3>　　　　　</h3>
                        <a href="" rel="tooltip" title="お気に入り"><span class="fa fa-heart-o fa-2x"></span></a>
                        <a href="" rel="tooltip" title="商品詳細"><span class="fa fa-search fa-2x"></span></a>
                    </div>
                    <img src="profile_image/image.e.jpg" class="img-responsive">
                    <div class="propertyType land" style="line-height: 20px;">ITパーク</div>
                </div>
                <div class="info">
                    <p class="small" style="text-overflow: ellipsis">商品名</p>
                    <p class="small wb-red">引き渡し可能日</p>
                </div>
                <div class="stats wb-red-bg text-center">
                    <span class="fa fa-rub" rel="tooltip" title="価格：６０ペソ"> <strong>１８０</strong></span>
                </div>
            </div>



            <div class="col-md-3 col-sm-4">
                <div class="view">
                    <div class="caption">
                        <h3>　　　　　</h3>
                        <a href="" rel="tooltip" title="お気に入り"><span class="fa fa-heart-o fa-2x"></span></a>
                        <a href="" rel="tooltip" title="商品詳細"><span class="fa fa-search fa-2x"></span></a>
                    </div>
                    <img src="profile_image/image.e.jpg" class="img-responsive">
                    <div class="propertyType commercial" style="line-height: 20px;">ITパーク</div>
                </div>
                <div class="info">
                    <p class="small" style="text-overflow: ellipsis">商品名</p>
                    <p class="small wb-red">引き渡し可能日</p>
                </div>
                <div class="stats wb-red-bg text-center">
                    <span class="fa fa-rub" rel="tooltip" title="価格：６０ペソ"> <strong>１８０</strong></span>
                </div>
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