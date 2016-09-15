<?php $this->assign('title', 'オーダー登録'); ?>

<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <div class="cM_Left5 cBtn2" style="width:40px;" >
          <a href="<?= $this->Url->build('/Orders/index/', true) ?>">オーダー一覧</a>
        </div>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div class="orders form large-9 medium-8 columns content cM_Left20 cM_Top20">
    <?= $this->Form->create($order) ?>
        <legend><?= __('オーダー新規登録') ?></legend>
        <?php echo $this->element('order_edit');?>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>


<!--
<form method="post" accept-charset="utf-8" action="/hl_system/Orders/add/">
  <input type="text" name="address" class="cW300px" maxlength="500" id="address"/>
  <select name="m_record_types_id_1" class="m_record_types_id" id="m-record-types-id">
    <option value=""></option>
    <option value="1">7 INCH(ブラック1.5mm盤)</option>
    <option value="2">7 INCH(クリア1mm盤)</option>
    <option value="3">7 INCH(Flexi盤)</option>
    <option value="4">12 INCH(ブラック1.5mm盤)</option>
    <option value="5">12 INCH(クリア1mm盤)</option>
  </select>
  <?= $this->Form->button(__('登録')) ?>
</form>
-->
