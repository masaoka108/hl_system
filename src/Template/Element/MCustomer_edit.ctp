<table class="cListTable2">
  <tr>
    <th class="cW150px">
      ユーザー姓
    </th>
    <td>
      <?php echo $this->Form->input('name_sei',array('label'=>false, 'div'=>false,'style'=>'width:160px;')); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      ユーザー名
    </th>
    <td>
      <?php echo $this->Form->input('name_mei',array('label'=>false, 'div'=>false,'style'=>'width:160px;')); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      メールアドレス
    </th>
    <td>
      <?php echo $this->Form->input('mail_address',array('label'=>false, 'div'=>false,'style'=>'width:200px;')); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      郵便番号
    </th>
    <td>
      <?php echo $this->Form->input('zip_code',array('label'=>false, 'div'=>false,'style'=>'width:160px;')); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      住所
    </th>
    <td>
      <?php echo $this->Form->input('address',array('label'=>false, 'div'=>false,'style'=>'width:300px;')); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      電話番号
    </th>
    <td>
      <?php echo $this->Form->input('tel',array('label'=>false, 'div'=>false,'style'=>'width:160px;')); ?>
    </td>
  </tr>
</table>
