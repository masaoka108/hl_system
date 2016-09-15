<table class="cListTable1" id="order_data">
  <tr>
    <th class="cW150px">
      オーダー日
    </th>
    <td>
      <?php echo $this->Datepicker->datepicker('order_date',array('id'=>'order_date', 'required'=>false,'label'=>false,'value'=> $this->Utility->get_date($order["order_date"]),'style'=>'width:80px', 'div'=>false,'type' => 'text'));?>
      <?php //echo $this->Form->input('order_date',array('label'=>false, 'div'=>false)); ?>
    </td>

    <th rowspan="7" class="cW150px">
      備考
    </th>
    <td  rowspan="7">
      <?php echo $this->Form->input('note',array('label'=>false, 'div'=>false,'style'=>'height:200px;width:300px'));?>
    </td>

  </tr>

  <tr>
    <th class="cW150px">
      カスタマー
    </th>
    <td>
      <?php echo $this->Form->input('m_customers_id', ['options' => $m_customers, 'empty' => true,'label'=>false, 'div'=>false,'class'=>'cM_customers_id']); ?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      カスタマー氏名
    </th>
    <td>
<!--
      <input type="text" name="name_sei" class="cFloatLeft cW70px c_name_sei" maxlength="50"/>
      <input type="text" name="name_mei" maxlength="50" class=" cW70px c_name_mei"/>
-->
      <?php echo $this->Form->input('name_sei',array('label'=>false,'error' => false, 'required'=>false, 'div'=>false,'class'=>'cFloatLeft cW70px c_name_sei'));?>
      <?php echo $this->Form->input('name_mei',array('label'=>false, 'div'=>false,'class'=>'cW70px c_name_mei'));?>
      <?php echo $this->Form->error('name_sei');?>
      <?php echo $this->Form->error('name_mei');?>

    </td>
  </tr>

  <tr>
    <th class="cW150px">
      メール
    </th>
    <td>
      <?php echo $this->Form->input('mail_address',array('label'=>false, 'div'=>false,'class'=>'c_mail_address'));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      郵便番号
    </th>
    <td>
      <?php echo $this->Form->input('zip_code',array('label'=>false, 'div'=>false,'class'=>'c_zip_code'));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      住所
    </th>
    <td>
      <?php echo $this->Form->input('address',array('label'=>false, 'div'=>false,'class' => 'cW300px c_address'));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      TEL
    </th>
    <td>
      <?php echo $this->Form->input('tel',array('label'=>false, 'div'=>false,'class' => 'c_tel'));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      送料
    </th>
    <td>
      <?php echo $this->Form->input('delivery_fee',array('label'=>false, 'div'=>false));?>
    </td>

    <th class="cW150px">
      合計金額
    </th>
    <td>
      <?php echo $this->Form->input('order_amount',array('label'=>false, 'div'=>false));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      利益
    </th>
    <td>
      <?php echo $this->Form->input('profit',array('label'=>false, 'div'=>false));?>
    </td>

    <th class="cW150px">
      希望納品日
    </th>
    <td>
      <?php //echo $this->Form->input('desired_delivery_date', ['empty' => true,'label'=>false]);?>
      <?php echo $this->Datepicker->datepicker('desired_delivery_date',array('id'=>'desired_delivery_date','label'=>false,'value'=> $this->Utility->get_date( $order["desired_delivery_date"]) ,'style'=>'width:80px', 'div'=>false,'type' => 'text'));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      納品予定日
    </th>
    <td>
      <?php //echo $this->Form->input('estimated_delivery_date', ['empty' => true,'label'=>false]);?>
      <?php echo $this->Datepicker->datepicker('estimated_delivery_date',array('id'=>'estimated_delivery_date','label'=>false,'value'=> $this->Utility->get_date ( $order["estimated_delivery_date"]) ,'style'=>'width:80px', 'div'=>false,'type' => 'text'));?>
    </td>

    <th class="cW150px">
      納品日
    </th>
    <td>
      <?php //echo $this->Form->input('delivery_date', ['empty' => true,'label'=>false]);?>
      <?php echo $this->Datepicker->datepicker('delivery_date',array('id'=>'delivery_date','label'=>false,'value'=> $this->Utility->get_date( $order["delivery_date"]) ,'style'=>'width:80px', 'div'=>false,'type' => 'text'));?>
    </td>
  </tr>

  <tr>
    <th class="cW150px">
      WORKS掲載
    </th>
    <td>
      <!--<?php echo $this->Form->input('works_on',array('label'=>false, 'div'=>false));?>-->
      <?php echo $this->Form->input('works_on', ['options' => $arWorks, 'empty' => false,'label'=>false, 'div'=>false]); ?>
    </td>
  </tr>



</table>

<legend class="cM_Top10"><?= __('オーダー内容') ?></legend>

<table id="p2146-2-table" class="cListTable1 cM_Bottom10">
  <thead>
    <tr>
      <th>レコード盤
      </th>
      <th>数量
      </th>
      <th>RPM
      </th>
      <th>アーティスト名
      </th>
      <th>タイトル
      </th>
      <th>トラックリスト
      </th>
      <th class="cW100px">順番
      </th>
      <th class="cW100px">行
        <!--追加/削除-->
      </th>
    </tr>
  </thead>
  <tbody id="p2146-2-tbody" >
    <tr>
      <td>
        <?php echo $this->Form->input('m_record_types_id', ['options' => $m_record_types,'selected'=>1, 'empty' => true,'label'=>false, 'div'=>false,'class' => 'm_record_types_id']); ?>
      </td>
      <td>
        <?php echo $this->Form->input('qty',array('label'=>false, 'div'=>false,'class'=>'qty cW40px'));?>
      </td>
      <td>
        <?php echo $this->Form->input('rpm', ['options' => $arRPM, 'empty' => true,'label'=>false, 'div'=>false,'class'=>'rpm']); ?>
      </td>
      <td>
        <?php echo $this->Form->input('artist_name',array('label'=>false, 'div'=>false,'class' => 'cW200px artist_name' ));?>
      </td>
      <td>
        <?php echo $this->Form->input('title',array('label'=>false, 'div'=>false,'class' => 'cW200px title'));?>
      </td>
      <td>
        <?php echo $this->Form->input('track_list',array('label'=>false, 'div'=>false,'style'=>'height:30px;width:300px','class'=>'track_list'));?>
      </td>
      <td class="cTextAlign_center">
        <input value="↑" type="button" class="upList" />
        <input value="↓" type="button" class="downList" />
      </td>
      <td class="cTextAlign_center">
        <input value="+" type="button" class="addList" />
        <input value="-" type="button" class="removeList" />
      </td>
    </tr>

<?php
$i=0;

foreach ($Orders_Details as $row) {
$i++;
?>

<tr>
  <td>
    <?php echo $this->Form->input('m_record_types_id', ['options' => $m_record_types,'value'=> $row['m_record_types_id'] , 'empty' => true,'label'=>false, 'div'=>false,'class' => 'm_record_types_id']); ?>
  </td>
  <td>
    <?php echo $this->Form->input('qty',array('label'=>false,'value'=>$row['qty'], 'div'=>false,'class'=>'qty cW40px'));?>
  </td>
  <td>
    <?php echo $this->Form->input('rpm', ['options' => $arRPM, 'value'=>$row['rpm'],'empty' => true,'label'=>false, 'div'=>false,'class'=>'rpm']); ?>
  </td>
  <td>
    <?php echo $this->Form->input('artist_name',array('label'=>false, 'value'=>$row['artist_name'],'div'=>false,'class' => 'cW200px artist_name' ));?>
  </td>
  <td>
    <?php echo $this->Form->input('title',array('label'=>false, 'value'=>$row['title'],'div'=>false,'class' => 'cW200px title'));?>
  </td>
  <td>
    <?php echo $this->Form->input('track_list',array('label'=>false, 'value'=>$row['track_list'],'div'=>false,'style'=>'height:30px;width:300px','class'=>'track_list'));?>
  </td>
  <td class="cTextAlign_center">
    <input value="↑" type="button" class="upList" />
    <input value="↓" type="button" class="downList" />
  </td>
  <td class="cTextAlign_center">
    <input value="+" type="button" class="addList" />
    <input value="-" type="button" class="removeList" />
  </td>
</tr>

<?php
}
?>

  </tbody>
</table>


<script>
//HTML=DOMの読み込みが終わったらfunction()の中の処理する。
//(読み込む前に実行するとエラーとなる場合があるので)
//.ready　とする事で実現している。

$(document).ready(function () {

$("#test_o").fadeIn('slow');

  var len = $("#p2146-2-tbody").children().length;
  if(len == 1)
  {
    // CSSで非表示にした1行目の行を複製し、その行の下に挿入
    // (ページがロードされた段階では1行も存在しないのでここでCLONEして1行目を作る。)
    $("#p2146-2-tbody > tr").eq(0).clone(true).insertAfter($("#p2146-2-tbody > tr")).eq(0);
  }

  //オブジェクトの名前を再命名
  object_rename();


  // 行を追加する
  // $(this).parent().parent() について
  //　$(this)は「.addlist」なのでつまりボタンの事である。
  // .parent()　メソッドで2段階上る事で<tr>を指定出来る。
  // .insertAfter　メソッドでその<tr>の後に行をコピーしている。
  $(document).on("click", ".addList", function () {

    //$("#p2146-2-tbody > tr").eq(0).clone(true).insertAfter($(this).parent().parent());
    var row = $("#p2146-2-tbody > tr").eq(0).clone(true);
    row.removeClass('my-row').css('display','none');
    row.insertAfter($(this).parent().parent()).fadeIn('slow');


    //オブジェクトの名前を再命名
    object_rename();
  });

  // 行を削除する
  $(document).on("click", ".removeList", function () {
    $(this).parent().parent().fadeOut('slow').queue(function(){this.remove();});


    //オブジェクトの名前を再命名
    object_rename();
  });

  // 行を一つ上に移動させる
  $(document).on("click", "#p2146-2-tbody > tr:gt(1) .upList", function () {
    var t = $(this).parent().parent();
    if(t.prev("tr")) {
      t.insertBefore(t.prev("tr")[0]);
    }

    //オブジェクトの名前を再命名
    object_rename();
  });

  // 行を一つ下に移動させる
  $(document).on("click", ".downList", function () {
    var t = $(this).parent().parent();
    if(t.next("tr")) {
      t.insertAfter(t.next("tr")[0]);
    }

    //オブジェクトの名前を再命名
    object_rename();

  });

  // 行の一部を変更する
  //  <select class="changeList">というDDLを変更した時
  $(document).on("change", ".changeList", function () {
    $(this).parent().next().html($(this).val());
  });







  //******カスタマーDLL チェンジ
  $(document).on("change", ".cM_customers_id", function () {

    //$('#order_data').html('<?= $this->Html->image('base/gif-load.gif')?>');
    //$('#order_data').html("<img src='/hl_system/img/base/gif-load.gif'/>");
    dispLoading("処理中...");

    //alert("cc");


    $.getJSON("<?= $this->Url->build('/MCustomers/MCustomerslist/', true) ?>/"+$(this).val(),
              null,
              function(data, status) {
                    //var str = JSON.stringify(data);
                    //alert(str);
                    //alert(data['result']['id']);
                    //alert($(".c_name_sei"));

                    $('.c_name_sei').val(data['result']['name_sei']);
                    $('.c_name_mei').val(data['result']['name_mei']);
                    $('.c_mail_address').val(data['result']['mail_address']);
                    $('.c_zip_code').val(data['result']['zip_code']);
                    $('.c_address').val(data['result']['address']);
                    $('.c_tel').val(data['result']['tel']);

                    //alert("11");
              }

    ).always(function() {
      //alert("22");

        //$("#order_data").empty();
        removeLoading();
    });

    //alert("cc");


  });




});



//******** Loadingイメージ表示関数
function dispLoading(msg){

    // 画面表示メッセージ
    var dispMsg = "";

    // 引数が空の場合は画像のみ
    if( msg != "" ){
        dispMsg = "<div class='loadingMsg'>" + msg + "</div>";

        //alert("aa");

    }

    //alert($("#loading").size());

    // ローディング画像が表示されていない場合のみ表示
    //if($("#loading").size() == 0){
        $("body").append("<div id='loading'>" + dispMsg + "</div>");
    //}



}

// Loadingイメージ削除関数
function removeLoading(){
 $("#loading").remove();
}





//******** 一覧内のオブジェクトの name を再定義(非表示としている1行目はnameの変更を行わない)
function object_rename(){

//alert("aaa");

    var len = $("#p2146-2-tbody").children().length;

    for (var i = 1; i < len; i++) {

      //alert($("#p2146-2-tbody > tr").eq(i).find('select.m_record_types_id').val());
      //alert("m_record_types_id_" + i);

        //コントロールをクラス名を使ってfindしている

        //レコード種類         order_details.0.m_record_types_id
        //$("#p2146-2-tbody > tr").eq(i).find('select.m_record_types_id').attr('name', "m_record_types_id_" + String(i));

//alert($("#p2146-2-tbody > tr").eq(i).find('select.m_record_types_id'));
//alert("order_details." + String(i-1) + ".m_record_types_id");

        //レコード盤
        $("#p2146-2-tbody > tr").eq(i).find('select.m_record_types_id').attr('name', "orders_details." + String(i-1) + ".m_record_types_id");

        //数量
        $("#p2146-2-tbody > tr").eq(i).find('input.qty').attr('name', "orders_details." + String(i-1) + ".qty");
//alert("qty:"+$("#p2146-2-tbody > tr").eq(i).find('select.qty').attr(name));

        //RPM
        $("#p2146-2-tbody > tr").eq(i).find('select.rpm').attr('name', "orders_details." + String(i-1) + ".rpm");
        //alert("rpm:"+$("#p2146-2-tbody > tr").eq(i).find('select.rpm'));

        //アーティスト名
        $("#p2146-2-tbody > tr").eq(i).find('input.artist_name').attr('name', "orders_details." + String(i-1) + ".artist_name");
        //alert("artist_name:"+$("#p2146-2-tbody > tr").eq(i).find('select.artist_name'));

        //タイトル
        $("#p2146-2-tbody > tr").eq(i).find('input.title').attr('name', "orders_details." + String(i-1) + ".title");
        //alert("title:"+$("#p2146-2-tbody > tr").eq(i).find('select.title'));

        //トラックリスト
        //$("#p2146-2-tbody > tr").eq(i).find('textarea.track_list').attr('name', "orders_details." + String(i-1) + ".track_list");
        $("#p2146-2-tbody > tr").eq(i).find('.track_list').attr('name', "orders_details." + String(i-1) + ".track_list");
        //alert("track_list:"+$("#p2146-2-tbody > tr").eq(i).find('input.track_list').attr('name'));


    }


/*
$(function($) {
    $('#m-customers-id').change(function() {
        alert("asdf");

        //var str = $(this).val();
    });
});
*/

//class : $(".cM_customers_id")



/*
    for(i=0,i < len -1;i++)
    {


    }
*/


    //一覧 行数で回す。
    //$i=0;
    //$("#p2146-2-tbody > tr").each(function() {

      //name を改めて設定

      //レコード種類
      //$(this).find('select.m_record_types_id').$(this).attr('name', "m_record_types_id_" + i);

      //i++;
    //}

  }


</script>
