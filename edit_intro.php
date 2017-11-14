<?php

session_start();


    if(!empty($_POST)){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $school = $_POST['school'];
    $introduce = $_POST['introduce'];


    $erros = array();

    if($username == '' ){
        $errors['username'] = 'blank';
    }
    if($email == '' ){
        $errors['email'] = 'blank';
    }
    if($password == '' ){
        $errors['password'] = 'blank';
    } elseif (strlen($password) < 4) {
        $errors['password'] = 'length';
    }
    if($gender == '' ){
        $errors['gender'] = 'blank';
    }
    if($school == '' ){
        $errors['school'] = 'blank';
    }
    if($introduce == '' ){
        $errors['introduce'] = 'blank';
    }

   $fileName = $_FILES['profile_image_path']['name'];

   if(!empty($fileName)){

        $ext = substr($fileName,-3);
        $ext = strtolower($ext);

        if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
            $errors['profile_image_path'] = 'extension';
        }

        }else{
          $errors['profile_image_path'] = 'blank';
        }

    if (empty($errors)){
      //確認ページへ飛ばす。
        //全てのチェックでエラーが無ければ画像アップロード

        $fileName=$_SESSION['login_user']['id']."__".$fileName;

        // unlink('profile_image/'.$_SESSION['login_user']['picture_path']);

        move_uploaded_file($_FILES['profile_image_path']['tmp_name'], 'profile_image/'.$fileName);

        // check.phpへリダイレクト
        // $_SESSEION スーパーグローバル変数
        // データを一時的に保存する
        $_SESSION['user_info']['username'] = $username;
        $_SESSION['user_info']['email'] = $email;
        $_SESSION['user_info']['password'] = $password;
        $_SESSION['user_info']['gender'] = $gender;
        $_SESSION['user_info']['school'] = $school;
        $_SESSION['user_info']['introduce'] = $introduce;
        $_SESSION['user_info']['picture_path'] = $fileName;


        // POST送信を破棄する
        header('Location: confirm_intro.php');
        exit();
    }

  }


  if(isset($_POST['profile_image_path'])){
    echo '画像を変更しました';
  }



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
  <title>プロフィール編集</title>
</head>
<body>

<?php


  require('parts/login_header.php');


 ?>
<?php require('parts/assets.php') ?>

<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg2.jpg); ">

<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 well">
            <h5 class="text-center">プロフィール編集</h5>
            <div class="devider"></div>
            <form action="#" method="post" class="form" role="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <input class="form-control" name="username" value="<?php echo $_SESSION['login_user']['username']; ?>" type="text"
                        required autofocus style="height:28px; font-size:12px;"/>
                </div>
            </div>
            <input class="form-control" name="email" value="<?php echo $_SESSION['login_user']['email']; ?>" required type="email" style="height:28px; font-size:12px;"/>
            <input class="form-control" name="password" placeholder="パスワード再登録" required type="password" style="height:28px; font-size:12px;"/>
            <!-- <input class="form-control" name="password" placeholder="パスワード再入力" type="password" style="height:28px; font-size:12px;"/> -->

<!--             <label for="" style="font-size:12px;padding-bottom:5px;">
                生年月日</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" style="height:28px; font-size:12px;">
                        <option value="Month">月</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" style="height:28px; font-size:12px;">
                        <option value="Day">日</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" style="height:28px; font-size:12px;">
                        <option value="Year">年</option>
                    </select>
                </div>
            </div> -->


            <label class="radio-inline" >
                <?php if($_SESSION['login_user']['gender']=='男'){ ?>
                <input type="radio" name="gender" id="inlineCheckbox1" required value="男" checked/>
                <?php } else{ ?>
                <input type="radio" name="gender" id="inlineCheckbox1" required value="男" />
                <?php } ?>
                男
            </label>
            <label class="radio-inline">
                <?php if($_SESSION['login_user']['gender']=='女'){ ?>
                <input type="radio" name="gender" id="inlineCheckbox2" required value="女" checked/>
                <?php } else{ ?>
                <input type="radio" name="gender" id="inlineCheckbox1" required value="女"/>
                <?php } ?>
                女
            </label>
            <br><br>
            <select class="form-control"  required name="school" style="height:28px; font-size:12px;">
              <option disabled selected>学校名</option>
            <?php if($_SESSION['login_user']['school']=='NexSeed'){ ?>
                  <option selected>NexSeed</option>
            <?php }else{ ?>
                  <option>NexSeed</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='QQ English'){ ?>
                  <option selected>QQ English</option>
            <?php }else{ ?>
                  <option>QQ English</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='NexSeed'){ ?>
                  <option selected>NexSeed</option>
            <?php }else{ ?>
                  <option>NexSeed</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='FEAセブシティ'){ ?>
                  <option selected>FEAセブシティ</option>
            <?php }else{ ?>
                  <option>FEAセブシティ</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='FirstEnglish'){ ?>
                  <option selected>FirstEnglish</option>
            <?php }else{ ?>
                  <option>FirstEnglish</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='ZEN English'){ ?>
                  <option selected>ZEN English</option>
            <?php }else{ ?>
                  <option>ZEN English</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='UV-ESL'){ ?>
                  <option selected>UV-ESL</option>
            <?php }else{ ?>
                  <option>UV-ESL</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='TARGET'){ ?>
                  <option selected>TARGET</option>
            <?php }else{ ?>
                  <option>TARGET</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='Brilliant Cebu'){ ?>
                  <option selected>Brilliant Cebu</option>
            <?php }else{ ?>
                  <option>Brilliant Cebu</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='CEGA'){ ?>
                  <option selected>CEGA</option>
            <?php }else{ ?>
                  <option>CEGA</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='Cebu Blue Ocean'){ ?>
                  <option selected>Cebu Blue Ocean</option>
            <?php }else{ ?>
                  <option>Cebu Blue Ocean</option>
            <?php } ?>
            <?php if($_SESSION['login_user']['school']=='3D ACADEMY'){ ?>
                  <option selected>3D ACADEMY</option>
            <?php }else{ ?>
                  <option>3D ACADEMY</option>
            <?php } ?>


            </select>
            <textarea class="form-control" name="introduce" required type="text" style="height:80px;font-size:12px;"/><?php echo $_SESSION['login_user']['introduce']; ?></textarea>

            <label for="file_photo" style="color: white;background-color: crimson;padding: 6px;border-radius: 6px; cursor:pointer;font-size:12px;">
              プロフィール画像を選択
                <input type="file" id="file_photo" name="profile_image_path" accept="image/*" required style="display:none" >
            </label>

        <?php if(isset($errors['profile_image_path'])&& $errors['profile_image_path']=='blank'){ ?>
            <div class="alert alert-danger">画像を選択してください。</div>
        <?php }elseif(isset($errors['profile_image_path']) && $errors['profile_image_path']== 'extension'){ ?>
            <div class="alert alert-danger">使用できる拡張子はjpgまたはpngまたはgifのみです。</div>
        <?php } ?>

            <div class="preview2" style="padding-top:5px;"><img src="profile_image/<?php echo $_SESSION['login_user']['picture_path']; ?>" width="150"></div>


            <div class="preview" style="padding-bottom:7px;"></div>


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
        $preview2 = $(".preview2");
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
        $preview2.empty();
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