<!DOCTYPE html>
<html lang="ja">
<head>
<title><?= h($this->fetch('title')) ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<?php
echo $this->Html->css('style.css');
echo $this->Html->css('jquery.mb.YTPlayer.css');

echo $this->Html->script('jquery-3.1.0.min.js');
echo $this->Html->script('jquery.mb.YTPlayer.src.js');


echo $this->Html->script('dep/jquery.mb.browser.min.js');
echo $this->Html->script('dep/jquery.mb.CSSAnimate.min.js');
echo $this->Html->script('dep/jquery.mb.simpleSlider.min.js');
echo $this->Html->script('dep/jquery.mb.storage.min.js');



echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>

<?php
//echo $this->Html->css('base.css')
//echo $this->Html->css('cake.css')
?>


</head>
<body>

<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>

<div class="cFooterBk">
  <div class="cFooter">
      <p class="cTextAlign_center">
      Copyright (C) 2015 HI LIBERATE All Rights Reserved.
    </p>
  </div>
</div>
</body>
</html>
