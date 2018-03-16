<?php $this->assign('title', 'カスタマーマスタ登録'); ?>

<div class="mCustomers form large-9 medium-8 columns content cM_Left20 cM_Top20">
  <h3><?= __('カスタマーマスタ新規登録') ?></h3>

  <div class="cM_Left5 cBtn1 cM_Bottom30" style="width:150px;" >
    <?= $this->Html->link(__('カスタマーマスタ一覧へ'), ['action' => 'index']) ?>
  </div>

  <?= $this->Form->create($mCustomerErr) ?>

  <?php echo $this->Form->error('name_sei');?>
  <?php echo $this->Form->error('name_mei');?>

  <?= $this->Form->end() ?>


    <?= $this->Form->create($mCustomer) ?>
      <?php echo $this->element('MCustomer_edit');?>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>


    <?= $this->Form->create($mCustomer2) ?>
        <?= $this->Form->hidden('MCustomers.0.id') ?>
        <?= $this->Form->input('MCustomers.0.name_sei');?>
      	<?= $this->Form->input('MCustomers.0.name_mei');?>
        <?= $this->Form->hidden('MCustomers.1.id') ?>
      	<?= $this->Form->input('MCustomers.1.name_sei');?>
      	<?= $this->Form->input('MCustomers.1.name_mei');?>

        <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>


</div>
