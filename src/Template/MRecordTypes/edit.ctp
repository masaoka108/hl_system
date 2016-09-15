<?php $this->assign('title', 'レコード種類マスタ修正'); ?>

<div style="margin-left:20px;" class="mRecordTypes form large-9 medium-8 columns content cM_left20 cM_Top20">
  <h3><?= __('レコード種類マスタ変更') ?></h3>

  <div class="cM_Left5 cBtn1 cM_Bottom30" style="width:150px;" >
    <?= $this->Html->link(__('レコード種類マスタ一覧へ'), ['action' => 'index']) ?>
  </div>

    <?= $this->Form->create($mRecordType) ?>
    <?php echo $this->element('MRecordType_edit');?>
    <?= $this->Form->button(__('修正')) ?>
    <?= $this->Form->end() ?>
</div>
