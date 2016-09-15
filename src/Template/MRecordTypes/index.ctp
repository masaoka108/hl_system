<?php $this->assign('title', 'レコード種類マスタ一覧'); ?>

<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New M Record Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div class="mRecordTypes index large-9 medium-8 columns content">
    <h3><?= __('レコード種類マスタ一覧') ?></h3>

    <div style="" class="cMP0" >
        <a href="<?= $this->Url->build('/MRecordTypes/add/', true) ?>">
          <li class="cM_Left5 cBtn1" style="width:70px;" >
            新規登録
          </li>
        </a>
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
                <th><?= $this->Paginator->sort('record_type_name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mRecordTypes as $mRecordType): ?>
            <tr>
                <!--<td><?= $this->Number->format($mRecordType->id) ?></td>-->
                <td><?= h($mRecordType->record_type_name) ?></td>
                <td class="actions">
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $mRecordType->id]) ?>-->

                    <div class="cM_Left5 cBtn2" style="width:40px;" >
                      <?= $this->Html->link(__('変更'), ['action' => 'edit', $mRecordType->id]) ?>
                    </div>

                    <div class="cM_Left5 cBtn2" style="width:40px;" >
                      <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $mRecordType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mRecordType->id)]) ?>
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
