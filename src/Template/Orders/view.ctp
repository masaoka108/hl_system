<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name Sei') ?></th>
            <td><?= h($order->name_sei) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Mei') ?></th>
            <td><?= h($order->name_mei) ?></td>
        </tr>
        <tr>
            <th><?= __('Mail Address') ?></th>
            <td><?= h($order->mail_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Zip Code') ?></th>
            <td><?= h($order->zip_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($order->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= h($order->tel) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Delivery Fee') ?></th>
            <td><?= $this->Number->format($order->delivery_fee) ?></td>
        </tr>
        <tr>
            <th><?= __('Order Amount') ?></th>
            <td><?= $this->Number->format($order->order_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Profit') ?></th>
            <td><?= $this->Number->format($order->profit) ?></td>
        </tr>
        <tr>
            <th><?= __('Works On') ?></th>
            <td><?= $this->Number->format($order->works_on) ?></td>
        </tr>
        <tr>
            <th><?= __('Entry') ?></th>
            <td><?= $this->Number->format($order->entry) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Person') ?></th>
            <td><?= $this->Number->format($order->ins_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Edit Person') ?></th>
            <td><?= $this->Number->format($order->edit_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Order Date') ?></th>
            <td><?= h($order->order_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Desired Delivery Date') ?></th>
            <td><?= h($order->desired_delivery_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Estimated Delivery Date') ?></th>
            <td><?= h($order->estimated_delivery_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Delivery Date') ?></th>
            <td><?= h($order->delivery_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Date') ?></th>
            <td><?= h($order->ins_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Date') ?></th>
            <td><?= h($order->edt_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Note') ?></h4>
        <?= $this->Text->autoParagraph(h($order->note)); ?>
    </div>
</div>
