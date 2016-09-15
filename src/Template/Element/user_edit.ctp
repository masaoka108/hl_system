<table class="cListTable2">
  <tr>
    <th class="cW150px">
      ユーザー名
    </th>
    <td>
      <?php echo $this->Form->input('username',array('label'=>false, 'div'=>false,'style'=>'width:160px;')); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      パスワード
    </th>
    <td>
      <?php echo $this->Form->input('password',array('label'=>false, 'div'=>false,'style'=>'width:150px;')); ?>
      <input type="hidden" name="del_flg" value="1">
    </td>
  </tr>

</table>

<!--
<fieldset>
    <legend><?= __('Edit User') ?></legend>
    <?php
        echo $this->Form->input('del_flg');
        echo $this->Form->input('ins_date', ['empty' => true]);
        echo $this->Form->input('ins_person');
        echo $this->Form->input('edt_date', ['empty' => true]);
        echo $this->Form->input('edt_person');
    ?>
</fieldset>
-->
