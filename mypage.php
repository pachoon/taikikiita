<?php
  session_start();
  require('dbconnect.php');

  // ログイン状態かチェック
if(!isset($_SESSION['login_user']['id'])){
    // セッションデータを保持しているかチェック
    // セッションデータがなければ、ログインページへ飛ばす
    header('Location: login.php');
    exit();

 } ?>






<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">
  <link href="css/user_information.css" rel="stylesheet" />
 <!--  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'> -->

  <meta charset="utf-8">

  <title>マイページ</title>
</head>
<body>

  <?php require('parts/login_header.php'); ?>

    <div class="container">
    <div class="row">
    </div>
  </div>
<div class="body">
<section id="contact">
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

        <h2 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s" style="color: black; font-size:34px;">マイページ</span></h2>
        <div class="devider" style="margin-bottom:20px;"></div>

<div class="container">
    <div class="row clearfix well">
    <div class="col-md-2 column">


      <img class="img-thumbnail" alt="140x140" src="profile_image/<?php echo $_SESSION['login_user']['picture_path'];?>" >

    </div>
    <div class="col-md-8 column">
      <blockquote>
        <p style="font-size: 40px; color: black; margin-top:25px;" >
          <?php echo $_SESSION['login_user']['username']; ?> 
        </p> <!-- <small>学校名 / 性別 / </small> -->
      </blockquote>
    </div>
    <div class="col-md-2 column" style="margin-top:5px;">
         <button class="btn btn-default btn-block" type="button"><a href="edit_intro.php"><span style="font-weight: 900; color: white; font-size:12px;">
                    プロフィール編集</span></a>
                 </button>
                 <button class="btn btn-default btn-block" type="button"><a href="edit_putup.php?login_user_id=<?php echo $_SESSION['login_user']['id']; ?>"><span style="font-weight: 900; color: white;">
                    出品管理</span></a>
                 </button>
                 <button class="btn btn-default btn-block" type="button"><a href="favorite2.php"><span style="font-weight: 900; color: white;">
                    お気に入り</span></a>
                 </button>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="tabbable" id="tabs-444468">
        <div class="tab-content" style="margin-top:20px;">
          <div class="tab-pane active" id="panel-200304">
             <div class="row clearfix">
                      <div class="col-md-8 column">
                        <ul class="nav nav-tabs">
                          <li class="active">
                            <div style="font-size: 26px; margin-bottom:13px;">【About Me】</div>
                          </li>
                          <!-- <li>
                            <a href="#panel-567649" data-toggle="tab">Photos</a>
                          </li> -->
                        </ul>
                      <p style="text-align: left; word-break: normal;"><br>
                        <!-- <strong style="font-size: 40px;"">About me</strong><br/> -->
                          <span style="color: black; font-size: 18px; "><?php echo $_SESSION['login_user']['introduce']; ?></span>
                      </p>
                                <hr/>
                                <!-- <p>
                          <strong>What i am doing with my life</strong><br/>
                                    it's just awful to write this stuff and i hate having to sell myself or make myself seem like some amazing superhuman. i have some generic interests, im a bit shy, and i dont play games and just want be there for a girl and make her feel like the most unique and special person, so this is one of the most annoying experiences ever. i dont even know why i bother with this stuff when everyone is basically selling themselves as an idealized superman and I just want girls to know who I am and they can take or leave it. 
                      </p>
                                <hr/>
                                <p>
                            <strong>I am really good at ?</strong><br/>
                                    it's just awful to write this stuff and i hate having to sell myself or make myself seem like some amazing superhuman. i have some generic interests, im a bit shy, and i dont play games and just want be there for a girl and make her feel like the most unique and special person, so this is one of the most annoying experiences ever. i dont even know why i bother with this stuff when everyone is basically selling themselves as an idealized superman and I just want girls to know who I am and they can take or leave it. 
                      </p>
                                <hr/>
                                <p>
                              <strong>The first thing you will notice about me?</strong><br/>
                                    it's just awful to write this stuff and i hate having to sell myself or make myself seem like some amazing superhuman. i have some generic interests, im a bit shy, and i dont play games and just want be there for a girl and make her feel like the most unique and special person, so this is one of the most annoying experiences ever. i dont even know why i bother with this stuff when everyone is basically selling themselves as an idealized superman and I just want girls to know who I am and they can take or leave it. 
                      </p>
                                <hr/> -->
                                <!-- <p>
                                <strong>I cant live without ?</strong><br/>
                                    My Mobile
                                    My Car
                                    My Dog
                      </p>
                                <hr/> -->
                                <!-- <p class="well">
                                <strong>I am looking for ?</strong><br/>
                                   someone good with heart
                      </p> -->
                    </div>
                    <div class="col-md-4 column">
                        <ul class="nav nav-tabs">
                          <li class="active">
                            <div style="font-size: 26px; margin-bottom:13px;">【Details】</div>
                          </li>
                          <!-- <li>
                            <a href="#panel-567649" data-toggle="tab">Photos</a>
                          </li> -->
                        </ul>
                      <p style="text-align: left; word-break: normal;"><br>
                      <span style="font-size: 20px; color: black">　[School]</span>
                          <span style="color: black; font-size: 20px; padding-left:70px;" ><?php echo $_SESSION['login_user']['school'];?></span>
                      </p>
                                <hr/>

                      <p style="text-align: left; word-break: normal; padding-top:5px;">
                      <span style="font-size: 20px; color: black;">　[Gender]</span>
                          <span style="color: black; font-size: 20px; padding-left:100px;" ><?php echo $_SESSION['login_user']['gender'];?></span>
                      </p>
                                <hr/><br><br>

                                        <!-- <tr>
                              <td>
                              Height
                            </td>
                            <td>
                              5' 8"
                            </td>
                          </tr>
                                        <tr>
                                <td>
                              Body type
                            </td>
                            <td>
                              Slim
                            </td>
                          </tr>
                                        <tr>
                                <td>
                              Diet
                            </td>
                            <td>
                              Veg
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Smoke
                            </td>
                            <td>
                              No
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Drink
                            </td>
                            <td>
                              Occasionally
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Drugs
                            </td>
                            <td>
                              No
                            </td>
                          </tr>
                          <tr>
                                  <td>
                              Religion
                            </td>
                            <td>
                              Hindu
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Sign
                            </td>
                            <td>
                              Vergo
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Education
                            </td>
                            <td>
                              Masters
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Job
                            </td>
                            <td>
                              Consultant
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Income
                            </td>
                            <td>
                              5 figures
                            </td>
                          </tr>
                                        <tr>
                                  <td>
                              Language
                            </td> -->
<!--                             <td>
                              <ol>
                                                 <li>English</li>
                                                 <li>Spanish</li>
                                                 <li>Hindi</li>
                                                 </ol>
                            </td> -->
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
          </div>
          <!-- <div class="tab-pane" id="panel-567649">
                             <div class="row clearfix">
      <div class="col-md-8 column">
      <img alt="140x140" src="profile_image/image.g.jpg" />
    </div>
    <div class="col-md-4 column"> -->
      <!-- <p>
        Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
      </p> -->
<!--     </div>
  </div> -->
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

</body>
  <?php require('parts/footer.php'); ?>

</html>