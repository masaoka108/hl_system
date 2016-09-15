<?php $this->assign('title', 'ユーザー修正'); ?>

<div style="margin-left:20px;" class="users form large-9 medium-8 columns content cM_left20 cM_Top20">
    ユーザー変更
    <?= $this->Form->create($user) ?>
    <?php echo $this->element('user_edit');?>

    <?= $this->Form->button(__('変更')) ?>
    <?= $this->Form->end() ?>
</div>
