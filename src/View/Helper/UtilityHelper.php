<?php
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;    //トランザクションを使う為に追記
use \Exception;                           //try-catch を有効にする為に追記

    class UtilityHelper extends Helper{

    //ヘルパー
    var $helpers = array("Form","Html");

          function get_works_on_str($val) {

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


          function get_date($val) {

            $ret = "";

          try{
            if($val != null && is_string($val) == false){
              $ret = $val->format("Y/m/d");
            }
            else {
              $ret = $val;
            }
          }
          catch(Exception $e){

          }

          return $ret;
        }


    }
?>
