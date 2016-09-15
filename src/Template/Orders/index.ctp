<?php $this->assign('title', 'オーダー一覧'); ?>

<div class="orders index large-9 medium-8 columns content cM_Left10">

    <h3 class="cM_Left10"><?= __('オーダー一覧') ?></h3>

<?php
/*
    echo $this->Form->create();
    // You'll need to populate $authors in the template from your controller
    //echo $this->Form->input('author_id');
    // Match the search param in your table configuration
    echo $this->Form->input('customer_name',array('label'=>false, 'div'=>false));
    echo $this->Form->input('sei');
    echo $this->Form->button('Filter', ['type' => 'submit']);
    echo $this->Html->link('Reset', ['action' => 'index']);
    echo $this->Form->end();
*/
 ?>


 <?php
 echo $this->Form->create();
 ?>
    <table class='cListTable2 cM_Bottom10'>
      <tr>
        <th>オーダー日</th>
        <td>
          <div class='cFloatLeft'>
            <input class="cW80px" value='<?php echo $srhOrderDateFrom?>' type='text' id='srhOrderDateFrom' name='srhOrderDateFrom'/>～<input class="cW80px" value='<?php echo $srhOrderDateTo?>' type='text' id='srhOrderDateTo' name='srhOrderDateTo'/>
          </div>
        </td>

        <th>カスタマー氏名</th>
        <td>
          <div class='cFloatLeft'>
            <?php echo $this->Form->input('customer_name',array('label'=>false, 'div'=>false)); ?>
          </div>
        </td>

        <th>WORKS掲載</th>
        <td>
          <div>
            <?php echo $this->Form->input('works_on', ['options' => $arWorks, 'empty' => true,'label'=>false, 'div'=>false]); ?>
          </div>
        </td>

        <th>備考</th>
        <td>
          <div class='cFloatLeft'>
            <?php echo $this->Form->input('note',array('label'=>false, 'div'=>false)); ?>
          </div>
        </td>

      </tr>
    </table>
<?php
echo $this->Form->button('検索', ['type' => 'submit','class'=>'cM_Bottom10']);
//echo $this->Html->link('Reset', ['action' => 'index']);
echo $this->Form->end();
?>



    <div class="cFloatLeft">
      <a href="<?= $this->Url->build('/Orders/add/', true) ?>">
          <li class="cM_Left5 cBtn1" style="width:70px;" >
            新規登録
          </li>
        </a>
    </div>

    <div class="paginator" >
        <ul class="pagination">
            <div  class="cFloatRight cM_Right20 ">
              <?php //$this->Paginator->counter() ?>

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

    <table class="cListTable1 cM_Top5" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('オーダー日') ?></th>
<!--            <th><?= $this->Paginator->sort('登録ユーザー') ?></th>-->
                <th><?= $this->Paginator->sort('ユーザー氏名') ?></th>
<!--            <th><?= $this->Paginator->sort('ユーザー名') ?></th>-->
                <th><?= $this->Paginator->sort('メール') ?></th>
<!--
                <th><?= $this->Paginator->sort('郵便番号') ?></th>
                <th><?= $this->Paginator->sort('住所') ?></th>
                <th><?= $this->Paginator->sort('tel') ?></th>
                <th><?= $this->Paginator->sort('発送費') ?></th>
-->
                <th><?= $this->Paginator->sort('オーダー金額') ?></th>
<!--
                <th><?= $this->Paginator->sort('利益') ?></th>
-->
                <th><?= $this->Paginator->sort('納品希望日') ?></th>
<!--
                <th><?= $this->Paginator->sort('納品予定日') ?></th>
                <th><?= $this->Paginator->sort('納品日') ?></th>
-->
                <th><?= $this->Paginator->sort('WORKS掲載') ?></th>
<!--
                <th><?= $this->Paginator->sort('entry') ?></th>
                <th><?= $this->Paginator->sort('ins_date') ?></th>
                <th><?= $this->Paginator->sort('ins_person') ?></th>
                <th><?= $this->Paginator->sort('edt_date') ?></th>
                <th><?= $this->Paginator->sort('edit_person') ?></th>
-->
                <th class="actions"><div><?= __('操作') ?></div></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td class="cTextAlign_center"><?= h(date('Y/n/j', strtotime($order->order_date))) ?></td>
                <!--<td><?= $order->has('m_customer') ? $this->Html->link($order->m_customer->name_sei." ".$order->m_customer->name_mei, ['controller' => 'm_customers', 'action' => 'view', $order->m_customer->id]) : '' ?></td>-->
                <!--<td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>-->
                <td><?= h($order->name_sei.' '.$order->name_mei) ?></td>
<!--            <td><?= h($order->name_mei) ?></td>-->
                <td><?= h($order->mail_address) ?></td>
<!--
                <td><?= h($order->zip_code) ?></td>
                <td><?= h($order->address) ?></td>
                <td><?= h($order->tel) ?></td>
                <td><?= $this->Number->format($order->delivery_fee) ?></td>
-->
                <td class="cTextAlign_right"><?= $this->Number->format($order->order_amount) ?></td>
<!--
                <td><?= $this->Number->format($order->profit) ?></td>
-->
                <td class="cTextAlign_center"><?= h(date('Y/n/j', strtotime($order->desired_delivery_date))) ?></td>
<!--
                <td><?= h($order->estimated_delivery_date) ?></td>
                <td><?= h($order->delivery_date) ?></td>
-->
                <td class="cTextAlign_center"><?php echo $this->Utility->get_works_on_str($this->Number->format($order->works_on))  ?></td>
<!--
                <td><?= $this->Number->format($order->entry) ?></td>
                <td><?= h($order->ins_date) ?></td>
                <td><?= $this->Number->format($order->ins_person) ?></td>
                <td><?= h($order->edt_date) ?></td>
                <td><?= $this->Number->format($order->edit_person) ?></td>
-->
                <td class="actions cTextAlign_center">

<!--
                  <div class="cM_Left5 cBtn2" style="width:40px;" >
                    <a href="<?= $this->Url->build('/Orders/view/'.$order->id, true) ?>">閲覧</a>
                  </div>
-->

                  <a href="<?= $this->Url->build('/Orders/edit/'.$order->id, true) ?>">
                    <div class="cM_Left5 cBtn2" style="width:40px;" >
                      修正
                    </div>
                  </a>

<!--
                  <div class="cM_Left5 cBtn2" style="width:40px;" >
                    <?php echo $this->Form->postLink(__('削除'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
-->

                  </div>

                    <?php //echo $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                    <?php //echo $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                    <?php //echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div  class="paginator">
        <ul class="pagination">
            <div  class="cFloatRight cM_Right20">
              <?php //$this->Paginator->counter() ?>

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

<script>

$(document).ready( function() {
    $( '#srhOrderDateFrom' ).datepicker({ dateFormat: 'yy/mm/dd' });
    $( "#srhOrderDateTo" ).datepicker({ dateFormat: 'yy/mm/dd' });
});

</script>
