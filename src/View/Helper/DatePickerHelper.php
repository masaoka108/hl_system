<?php
namespace App\View\Helper;
use Cake\View\Helper;

    class DatepickerHelper extends Helper{

    //ヘルパー
    var $helpers = array("Form","Html");

    function datepicker($fieldName, $options = array()){
        //外部ファイル
/*
        $ext = $this->Html->script('jquery-3.1.0.min', array('inline' => false))
            . $this->Html->script('jquery-ui.min', array('inline' => false))
            //. $this->Html->script('jquery.ui.datepicker-ja', array('inline' => false))
            . $this->Html->css('jquery-ui.min', null, array('inline' => false));
*/

        //テキストボックスのhtml
        //$ext .= $this->Form->input($fieldName, $options);
        //debug($options);
        //die();
        $ext = $this->Form->input($fieldName, $options);

//echo $ext;
//die();

        //テキストボックスのID
        if(isset($options["id"])) {
            $id = $options["id"];
        } else {
            //$id = $this->Form->domId(array(), "for");
            $id = $fieldName;
        }

        //スクリプト部分
/*
        $script =
            "jQuery(function($){".
            //"$('#".$id["for"]."'").datepicker({changeMonth: true,changeYear: true});".
            "$('#".$id."').datepicker({changeMonth: true,changeYear: true});".
            "});";
*/

        $script =
            "<script>".
              "$(document).ready(function() {".
                  "$('#".$id."' ).datepicker({ dateFormat: 'yy/mm/dd' });".
              "})".
            "</script>";

      return $ext . $script;
        //return $ext . $this->Html->scriptBlock($script, array('inline' => false));


        //return $ext;
      }
    }
?>
