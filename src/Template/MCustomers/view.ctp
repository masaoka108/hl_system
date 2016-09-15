<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit M Customer'), ['action' => 'edit', $mCustomer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete M Customer'), ['action' => 'delete', $mCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mCustomer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List M Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New M Customer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mCustomers view large-9 medium-8 columns content">
    <h3><?= h($mCustomer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name Sei') ?></th>
            <td><?= h($mCustomer->name_sei) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Mei') ?></th>
            <td><?= h($mCustomer->name_mei) ?></td>
        </tr>
        <tr>
            <th><?= __('Mail Address') ?></th>
            <td><?= h($mCustomer->mail_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Zip Code') ?></th>
            <td><?= h($mCustomer->zip_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($mCustomer->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= h($mCustomer->tel) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($mCustomer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Del Flg') ?></th>
            <td><?= $this->Number->format($mCustomer->del_flg) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Person') ?></th>
            <td><?= $this->Number->format($mCustomer->ins_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Person') ?></th>
            <td><?= $this->Number->format($mCustomer->edt_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Date') ?></th>
            <td><?= h($mCustomer->ins_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Date') ?></th>
            <td><?= h($mCustomer->edt_date) ?></td>
        </tr>
    </table>
</div>
