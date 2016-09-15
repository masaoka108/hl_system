<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orders Detail'), ['action' => 'edit', $ordersDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orders Detail'), ['action' => 'delete', $ordersDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orders Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List M Record Types'), ['controller' => 'MRecordTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New M Record Type'), ['controller' => 'MRecordTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordersDetails view large-9 medium-8 columns content">
    <h3><?= h($ordersDetail->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Order') ?></th>
            <td><?= $ordersDetail->has('order') ? $this->Html->link($ordersDetail->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersDetail->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('M Record Type') ?></th>
            <td><?= $ordersDetail->has('m_record_type') ? $this->Html->link($ordersDetail->m_record_type->id, ['controller' => 'MRecordTypes', 'action' => 'view', $ordersDetail->m_record_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Artist Name') ?></th>
            <td><?= h($ordersDetail->artist_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($ordersDetail->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ordersDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty') ?></th>
            <td><?= $this->Number->format($ordersDetail->qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Rpm') ?></th>
            <td><?= $this->Number->format($ordersDetail->rpm) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Person') ?></th>
            <td><?= $this->Number->format($ordersDetail->ins_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Person') ?></th>
            <td><?= $this->Number->format($ordersDetail->edt_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Date') ?></th>
            <td><?= h($ordersDetail->ins_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Date') ?></th>
            <td><?= h($ordersDetail->edt_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Track List') ?></h4>
        <?= $this->Text->autoParagraph(h($ordersDetail->track_list)); ?>
    </div>
</div>
