<?php $this->assign('title', 'カスタマーマスタ一覧'); ?>

<div class="mCustomers index large-9 medium-8 columns content">
    <h3><?= __('カスタマーマスタ一覧') ?></h3>

    <div style="" class="cMP0" >
        <a href="<?= $this->Url->build('/MCustomers/add/', true) ?>">
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

    <table class="cListTable2 cM_Top5 cM_Left10" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--            <th><?= $this->Paginator->sort('id') ?></th>-->
                <th><?= $this->Paginator->sort('name_sei') ?></th>
                <th><?= $this->Paginator->sort('name_mei') ?></th>
                <th><?= $this->Paginator->sort('mail_address') ?></th>
                <th><?= $this->Paginator->sort('zip_code') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('tel') ?></th>
<!--
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
            <?php foreach ($mCustomers as $mCustomer): ?>
            <tr>
<!--            <td><?= $this->Number->format($mCustomer->id) ?></td>-->
                <td><?= h($mCustomer->name_sei) ?></td>
                <td><?= h($mCustomer->name_mei) ?></td>
                <td><?= h($mCustomer->mail_address) ?></td>
                <td><?= h($mCustomer->zip_code) ?></td>
                <td><?= h($mCustomer->address) ?></td>
                <td><?= h($mCustomer->tel) ?></td>
<!--
                <td><?= $this->Number->format($mCustomer->del_flg) ?></td>
                <td><?= h($mCustomer->ins_date) ?></td>
                <td><?= $this->Number->format($mCustomer->ins_person) ?></td>
                <td><?= h($mCustomer->edt_date) ?></td>
                <td><?= $this->Number->format($mCustomer->edt_person) ?></td>
-->
                <td class="actions">

                  <div class="cM_Left5 cBtn2" style="width:40px;" >
                    <?= $this->Html->link(__('変更'), ['action' => 'edit', $mCustomer->id]) ?>
                  </div>

                    <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $mCustomer->id]) ?>-->
                  <div class="cM_Left5 cBtn2" style="width:40px;" >
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $mCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mCustomer->id)]) ?>
                  </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
  </div>
