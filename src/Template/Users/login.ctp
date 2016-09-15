
 <script type="text/javascript">
 $(function(){
     $(".player").YTPlayer();
 });
 </script>

<?php $this->assign('title', 'ログインページ'); ?>


<a id="bgndVideo" class="player" data-property="{videoURL:'https://youtu.be/gz2ajbEFj9Y',containment:'body',autoPlay:true, mute:true,loop:true,startAt:28,opacity:1,showControls:false}"></a>

<?= $this->Form->create() ?>

<?php
 //echo $this->Form->input('dateLimite', ['type'=>'text', 'foo' => 'bar', 'class' => 'datepicker']);


//echo $this->Form->input('username')
?>
<div class="cLoginDiv ">
   <?= $this->Html->image('base/hl_logo.png',array('class' => 'cW300px cImgCenter'))?>
   <hr style="background-color:black;border: none;height: 1px;">
    <div class="cM_Top10">
    user name<br>
    <?php
      echo $this->Form->input('username', array('type'=>'text', 'label'=>false, 'div'=>false,'class' => 'cW150px cTextBox'));
    ?>
    </div>

    <div class="cM_Top10">
    password<br>
    <?php
      echo $this->Form->input('password', array('label'=>false, 'div'=>false,'class' => 'cW150px cTextBox','style' => 'width:168px;height:25px;padding-left:20px;'));
    ?>
    </div>

<?php
      echo $this->Form->button('Login',array('label'=>'ログイン','class' => 'cM_Top30 cSubmitBtn cW250px cImgCenter'));
      echo $this->Form->end();
?>

  </div>

</div>

<?php
//下記でログイン動作していた。
/*
 echo $this->Form->input('username', ['class' => 'cW150px']);
 echo $this->Form->input('password')
 echo $this->Form->button('Login')
 echo $this->Form->end()
*/
 ?>
