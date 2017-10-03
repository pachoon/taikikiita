<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">  
  <meta charset="utf-8">
  <title>チャット一覧</title>
  <link href="css/chat_list.css" rel="stylesheet" />


  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body style="background-color: #3a6186 , #89253e">

  <?php require('parts/header.php'); ?>
  <div class="container">
    <div class="row">
    </div>
  </div>

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
 
        <h1 class="section-header" style="text-align: center;"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> チャット一覧</span></h1>
        <br>
        <br>
<div class="container">
  <div class="row">

    <section class="content">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-filter" data-target="pagado">送信（購入者）</button>
                <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">受信（出品者）</button>
                <!-- <button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button> -->
                <button type="button" class="btn btn-default btn-filter" data-target="all">全て</button>
              </div>
            </div>
            <div class="table-container" >
              <table class="table table-filter">
                <tbody>
                  <tr data-status="pagado">
<!--                     <td>
                      <div class="ckbox">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1"></label>
                      </div>
                    </td> -->
<!--                     <td>
                      <a href="javascript:;" class="star">
                        <i class="glyphicon glyphicon-star"></i>
                      </a>
                    </td> -->
                    <td >
                      <div class="media" >
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span >Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right pagado">(Pagado)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr data-status="pendiente">
<!--                     <td>
                      <div class="ckbox">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3"></label>
                      </div>
                    </td> -->
<!--                     <td>
                      <a href="javascript:;" class="star">
                        <i class="glyphicon glyphicon-star"></i>
                      </a>
                    </td> -->
                    <td>
                      <div class="media" style="width: 648px;">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right pendiente">(Pendiente)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
 <!--                  <tr data-status="cancelado">
                    <td>
                      <div class="ckbox">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2"></label>
                      </div>
                    </td>
                    <td>
                      <a href="javascript:;" class="star">
                        <i class="glyphicon glyphicon-star"></i>
                      </a>
                    </td> -->
                    <td>
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right cancelado">(Cancelado)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr data-status="pagado" class="selected">
                    <!-- <td> -->
<!--                       <div class="ckbox">
                        <input type="checkbox" id="checkbox4" checked>
                        <label for="checkbox4"></label>
                      </div>
                    </td>
                    <td>
                      <a href="javascript:;" class="star star-checked">
                        <i class="glyphicon glyphicon-star"></i>
                      </a>
                    </td>
 -->                    <td>
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right pagado">(Pagado)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr data-status="pendiente">
<!--                     <td>
                      <div class="ckbox">
                        <input type="checkbox" id="checkbox5">
                        <label for="checkbox5"></label>
                      </div>
                    </td>
                    <td>
                      <a href="javascript:;" class="star">
                        <i class="glyphicon glyphicon-star"></i>
                      </a>
                    </td>
 -->                    <td>
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                        </a>
                        <div class="media-body">
                          <span class="media-meta pull-right">Febrero 13, 2016</span>
                          <h4 class="title">
                            Lorem Impsum
                            <span class="pull-right pendiente">(Pendiente)</span>
                          </h4>
                          <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
</div>

  <?php require('parts/footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function () {

  $('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>
</body>
</html>

