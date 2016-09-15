<?php $this->assign('title', 'ユーザー登録'); ?>

<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
-->

<div class="users form large-9 medium-8 columns content cM_Left20 cM_Top20">
    <?= $this->Form->create($user) ?>
      <legend><?= __('ユーザー新規登録') ?></legend>
      <?php echo $this->element('user_edit');?>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
