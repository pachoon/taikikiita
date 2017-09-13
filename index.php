<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>セブティー</title>
  <?php require('parts/assets.php') ?>
</head>
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});
    </script>
    <?php require('parts/header.php'); ?>
    <br>
    <div id="main-wrapper">
      <div class="title">
        <p class="title-title">セブティー</p>
        <p class="title-subtitle">～留学の「イラナイ」を「ホシイ」に～</p>
      </div>
     <div class="login">
        <span>ログイン</span>
        <div class="login-text">
          <input type="text" name="user_name" placeholder="ユーザー名" class="input-text">
          <input type="text" name="password" placeholder="パスワード" class="input-text">
        </div>
        <div class="login-button">
          <button class="btn btn-info" name="login"　type="submit">ログイン</button>
          <button name="sign_up" value="新規登録" class="btn btn-warning">新規登録</button>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="search col-md-offset-3 col-md-2 col-sm-4 col-xs-12">
            <select name="genre" class="search1 form-control" style="width:80px;">
              <option value="choose">選択</option>
              <option value="cloths">洋服</option>
              <option value="appliances">電化製品</option>
              <option value="goods">雑貨品</option>
              <option value="ohters">その他</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-10">
            <!-- 調べたのですが　ブートストラップのform-control は タグ内のstyleでcssをいじるのが一番楽であったのでこうしました。 見ずらいですが、お許しを。-->
            <input type="text" placeholder="キーワード" class="search2 form-control" style="width:150px;">
          </div>
          <div class="col-md-2 col-sm-4 col-xs-2">
            <button　type="submit" class="search3 btn btn-danger">検索</button>
          </div>
          <div class="col-md-3">
          </div>
          </div>
        </div>
      </div>
    </div>
    <div id="new-item-wrapper">
      <div class="new-item-title">
        <span>新着商品</span>
        <img src="assets/img/new.png" width="20px" height="20px">
      </div>
      <div　class="container products">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
        </div>
      </div>
    </div>
    　
    <?php require('parts/footer.php') ?>
<body>

</body>
</html>