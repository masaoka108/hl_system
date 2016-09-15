<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Del Flg') ?></th>
            <td><?= $this->Number->format($user->del_flg) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Person') ?></th>
            <td><?= $this->Number->format($user->ins_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Person') ?></th>
            <td><?= $this->Number->format($user->edt_person) ?></td>
        </tr>
        <tr>
            <th><?= __('Ins Date') ?></th>
            <td><?= h($user->ins_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt Date') ?></th>
            <td><?= h($user->edt_date) ?></td>
        </tr>
    </table>
</div>
