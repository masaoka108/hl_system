<?php $this->assign('title', 'オーダー修正'); ?>

<div class="orders form large-9 medium-8 columns content  cM_Left20 cM_Top20">
    <?= $this->Form->create($order) ?>

    <?php echo $this->element('order_edit');?>

    <?= $this->Form->button(__('変更')) ?>
    <input type="button" value="削除" onclick="OnButtonClick('<?= $this->Url->build('/Orders/delete/'.$order['id'])?>');"/>

    <?= $this->Form->end() ?>

    <form name="del_form" style="display:none;" method="post" action="<?= $this->Url->build('/Orders/delete/'.$order['id'])?>">
    <input type="hidden" name="_method" value="POST"/>
    </form>

</div>

<script language="javascript" type="text/javascript">
  function OnButtonClick(url) {

     ret = confirm("このデータを削除してよろしいですか？");
        if ( ret == true ){
            document.del_form.submit();
            //window.location.href = url; // 通常の遷移
        }else{
            return false;
        }


//    target = document.getElementById("output");
//    target.innerHTML = "Penguin";
  }
</script>
