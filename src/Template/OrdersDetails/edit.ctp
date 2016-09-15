<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordersDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordersDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List M Record Types'), ['controller' => 'MRecordTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New M Record Type'), ['controller' => 'MRecordTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordersDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($ordersDetail) ?>
    <fieldset>
        <legend><?= __('Edit Orders Detail') ?></legend>
        <?php
            echo $this->Form->input('orders_id', ['options' => $orders]);
            echo $this->Form->input('m_record_types_id', ['options' => $mRecordTypes, 'empty' => true]);
            echo $this->Form->input('qty');
            echo $this->Form->input('rpm');
            echo $this->Form->input('artist_name');
            echo $this->Form->input('title');
            echo $this->Form->input('track_list');
            echo $this->Form->input('ins_date', ['empty' => true]);
            echo $this->Form->input('ins_person');
            echo $this->Form->input('edt_date', ['empty' => true]);
            echo $this->Form->input('edt_person');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
