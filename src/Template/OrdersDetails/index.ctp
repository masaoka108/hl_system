<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orders Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List M Record Types'), ['controller' => 'MRecordTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New M Record Type'), ['controller' => 'MRecordTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordersDetails index large-9 medium-8 columns content">
    <h3><?= __('Orders Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('orders_id') ?></th>
                <th><?= $this->Paginator->sort('m_record_types_id') ?></th>
                <th><?= $this->Paginator->sort('qty') ?></th>
                <th><?= $this->Paginator->sort('rpm') ?></th>
                <th><?= $this->Paginator->sort('artist_name') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('ins_date') ?></th>
                <th><?= $this->Paginator->sort('ins_person') ?></th>
                <th><?= $this->Paginator->sort('edt_date') ?></th>
                <th><?= $this->Paginator->sort('edt_person') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordersDetails as $ordersDetail): ?>
            <tr>
                <td><?= $this->Number->format($ordersDetail->id) ?></td>
                <td><?= $ordersDetail->has('order') ? $this->Html->link($ordersDetail->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersDetail->order->id]) : '' ?></td>
                <td><?= $ordersDetail->has('m_record_type') ? $this->Html->link($ordersDetail->m_record_type->id, ['controller' => 'MRecordTypes', 'action' => 'view', $ordersDetail->m_record_type->id]) : '' ?></td>
                <td><?= $this->Number->format($ordersDetail->qty) ?></td>
                <td><?= $this->Number->format($ordersDetail->rpm) ?></td>
                <td><?= h($ordersDetail->artist_name) ?></td>
                <td><?= h($ordersDetail->title) ?></td>
                <td><?= h($ordersDetail->ins_date) ?></td>
                <td><?= $this->Number->format($ordersDetail->ins_person) ?></td>
                <td><?= h($ordersDetail->edt_date) ?></td>
                <td><?= $this->Number->format($ordersDetail->edt_person) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordersDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordersDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordersDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
