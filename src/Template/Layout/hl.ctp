<!DOCTYPE html>
<html lang="ja">
<head>
<title><?= h($this->fetch('title')) ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


<?php
echo $this->Html->css('style.css');
echo $this->Html->css('jquery-ui.min.css');
echo $this->Html->css('jquery.jqplot.css');



echo $this->Html->script('jquery-3.1.0.min.js'); //jquery-3.1.0.min.js を読み込み
echo $this->Html->script('jquery-ui.min.js'); //jquery-3.1.0.min.js を読み込み
echo $this->Html->script('ccchart-min.js');
echo $this->Html->script('jquery.jqplot.min.js');
echo $this->Html->script('jqplot.dateAxisRenderer.js');
echo $this->Html->script('jqplot.highlighter.js');
echo $this->Html->script('jqplot.pointLabels.js');
echo $this->Html->script('jqplot.cursor.js');
echo $this->Html->script('jqplot.barRenderer.js');
echo $this->Html->script('jqplot.categoryAxisRenderer.js');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>

</head>
<body>

  <div class="cHeaderBk">
    <div class="cM_Left30 cM_Top5 cFloatLeft">
        <a href="<?= $this->Url->build('/orders/', true) ?>">
          <?= $this->Html->image('base/hl_logo.jpg',array('class' => 'cW300px '))?>
        </a>
    </div>

    <div class="cM_Right30 cM_Top5 cFloatRight">
      <div class="cFloatLeft"><?= $this->Html->image('base/user_icon.jpg',array('class' => 'cW30px cM_Top10 cVvertical_align_middle'))?></div>
      <div class="cM_Top20 cFloatLeft"><?= $username ?> 様</div>
      <div  class="cM_Top7 cFloatLeft">
        <input type="button" class="cM_Left20 cSubmitBtn cW100px" onclick="location.href='<?= $this->Url->build('/users/logout/', true) ?>'"value="Log Out">
      </div>
    </div>
  </div>

<?php //menu start?>

<div id="menu-wrap" class="cM_Top5 cMenuBgColor cW100 clearfix">
  <ul id="nav">
  <li><a href="<?= $this->Url->build('/Orders/index/', true) ?>">オーダー一覧</a></li>
  <li><a href="<?= $this->Url->build('/Orders/sales/', true) ?>">月別売上</a></li>


  <li><a href="#">マスタ管理</a>
  	<ul>
      <li><a href="<?= $this->Url->build('/Users/index/', true) ?>">ユーザー マスタ</a></li>
    	<li><a href="<?= $this->Url->build('/MRecordTypes/index/', true) ?>">レコード種類 マスタ</a></li>
      <li><a href="<?= $this->Url->build('/MCustomers/index/', true) ?>">カスタマー マスタ</a></li>
  	</ul>
  </li>
  <!--nav-->
  </ul>
</div>

<?php //menu end?>


<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>



<script type="text/javascript">
$("#btnSearch").click(function(){
  $("#txtSerch").toggle("slow");
});


$("#txtSerch").keypress( function ( e ) {
if ( e.which == 13 ) {
  return false;
}
} );



$(function() {
var nav = $('#nav');
var navTop = nav.offset().top;
$('li', nav).hover(function(){
$('ul',this).stop().slideDown('fast');
},
function(){
$('ul',this).stop().slideUp('fast');
});
});



$(function(){
    var box    = $("#menu-wrap");
    var boxTop = box.offset().top;
    $(window).scroll(function () {
        if($(window).scrollTop() >= boxTop) {
            box.addClass("fixed");
      $("body").css("margin-top","0px");
        } else {
            box.removeClass("fixed");
      $("body").css("margin-top","0px");
        }
    });
});

</script>

</body>
</html>
