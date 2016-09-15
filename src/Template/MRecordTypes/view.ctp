<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit M Record Type'), ['action' => 'edit', $mRecordType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete M Record Type'), ['action' => 'delete', $mRecordType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mRecordType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List M Record Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New M Record Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mRecordTypes view large-9 medium-8 columns content">
    <h3><?= h($mRecordType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Record Type Name') ?></th>
            <td><?= h($mRecordType->record_type_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($mRecordType->id) ?></td>
        </tr>
    </table>
</div>
