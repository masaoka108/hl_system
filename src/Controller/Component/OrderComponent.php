<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

class OrderComponent extends Component {
     public function getOrdersDetails($id,$data) {

       //とりあえずwhileで回す。
       $flg=false;
       $i=0;
       $arOrdersDetails = array();

       while($flg == false)
       {
         //その行にデータが存在するか確認
         $m_record_types_id = 'orders_details_'.(string)$i.'_m_record_types_id';
//                  echo $this->request->data[$m_record_types_id];
         if(array_key_exists($m_record_types_id,$data))
         {
           $qty = 'orders_details_'.(string)$i.'_qty';
           $rpm = 'orders_details_'.(string)$i.'_rpm';
           $artist_name = 'orders_details_'.(string)$i.'_artist_name';
           $title = 'orders_details_'.(string)$i.'_title';
           $track_list = 'orders_details_'.(string)$i.'_track_list';

           //データがあれば更新用の配列に追加
           $arTemp['orders_id'] = $id;
           $arTemp['m_record_types_id'] = $data[$m_record_types_id];
           $arTemp['qty'] = $data[$qty];
           $arTemp['rpm'] = $data[$rpm];
           $arTemp['artist_name'] = $data[$artist_name];
           $arTemp['title'] = $data[$title];
           $arTemp['track_list'] = $data[$track_list];

           array_push($arOrdersDetails,$arTemp);
         }
         else {
           //データが無ければwhile終了
           $flg=true;
         }
         //data['order_details_0_m_record_types_id']

         $i++;
       }
          return $arOrdersDetails;
     }


     public function get_works_on_str($val) {

       $ret = "";

       if($val == "0")
       {
         $ret= "無";
       }
       else if($val == "1")
       {
         $ret= "有";
       }

      return $ret;
     }




}
?>
