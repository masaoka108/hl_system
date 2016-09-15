<?php $this->assign('title', 'ユーザーマスタ一覧'); ?>


<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div class="users index large-9 medium-8 columns content">
    <h3><?= __('ユーザーマスタ一覧') ?></h3>

    <div style="" class="cMP0" >
        <li class="cM_Left5 cBtn1" style="width:70px;" >
          <a href="<?= $this->Url->build('/Users/add/', true) ?>">新規登録</a>
        </li>
    </div>

  <div style="margin-top:-5px;margin-bottom:-15px;"  class="paginator cMP0">
        <ul class="pagination">
            <div style="margin-left:-20px;" class=" cMP0">

              <?php
$page_msg =  $this->Paginator->param('page').'/'.$this->Paginator->param('pageCount').'ページ目を表示中　';
               ?>

              <?= $page_msg?>
              <?= $this->Paginator->prev('<<' . __('')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('>>') . '') ?>
            </div>
        </ul>
    </div>

    <table  class="cListTable2 cM_Top5 cM_Left10" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th><?= $this->Paginator->sort('id') ?></th>-->
                <th><?= $this->Paginator->sort('username') ?></th>
<!--
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('del_flg') ?></th>
                <th><?= $this->Paginator->sort('ins_date') ?></th>
                <th><?= $this->Paginator->sort('ins_person') ?></th>
                <th><?= $this->Paginator->sort('edt_date') ?></th>
                <th><?= $this->Paginator->sort('edt_person') ?></th>
-->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <!--<td><?= $this->Number->format($user->id) ?></td>-->
                <td><?= h($user->username) ?></td>
<!--
                <td><?= h($user->password) ?></td>
                <td><?= $this->Number->format($user->del_flg) ?></td>
                <td><?= h($user->ins_date) ?></td>
                <td><?= $this->Number->format($user->ins_person) ?></td>
                <td><?= h($user->edt_date) ?></td>
                <td><?= $this->Number->format($user->edt_person) ?></td>
-->
                <td class="actions">
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>-->
                    <div class="cM_Left5 cBtn2" style="width:40px;" >
                      <?= $this->Html->link(__('変更'), ['action' => 'edit', $user->id]) ?>
                    </div>

                    <div class="cM_Left5 cBtn2" style="width:40px;" >
                      <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top:-15px;margin-bottom:-15px;"  class="paginator cMP0">
        <ul class="pagination">
          <div style="margin-left:-20px;" class=" cMP0">

              <?php
$page_msg =  $this->Paginator->param('page').'/'.$this->Paginator->param('pageCount').'ページ目を表示中　';
               ?>

              <?= $page_msg?>
              <?= $this->Paginator->prev('<<' . __('')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('>>') . '') ?>
            </div>
        </ul>
    </div>
</div>
