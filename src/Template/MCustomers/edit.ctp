<?php $this->assign('title', 'カスタマーマスタ修正'); ?>

<div class="mCustomers form large-9 medium-8 columns content cM_left20 cM_Top20">
  <h3><?= __('カスタマーマスタ変更') ?></h3>

  <div class="cM_Left5 cBtn1 cM_Bottom30" style="width:150px;" >
    <?= $this->Html->link(__('カスタマーマスタ一覧へ'), ['action' => 'index']) ?>
  </div>

    <?= $this->Form->create($mCustomer) ?>
      <?php echo $this->element('MCustomer_edit');?>
    <?= $this->Form->button(__('修正')) ?>
    <?= $this->Form->end() ?>
</div>
