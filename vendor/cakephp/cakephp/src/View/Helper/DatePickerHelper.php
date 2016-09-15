<?php
    class DatepickerHelper extends AppHelper{
    //ヘルパー
    var $helpers = array("Form","Html");

    function datepicker($fieldName, $options = array()){
        //外部ファイル
/*
        $ext = $this->Html->script('jquery-1.9.1', array('inline' => false))
            . $this->Html->script('jquery-ui-1.10.3.custom', array('inline' => false))
            . $this->Html->script('jquery.ui.datepicker-ja', array('inline' => false))
            . $this->Html->css('jquery-ui-1.10.3.custom', null, array('inline' => false));

        //テキストボックスのhtml
        $ext .= $this->Form->input($fieldName, $options);
*/

        $ext = $this->Form->input($fieldName, $options);

        //テキストボックスのID
        if(isset($options["id"])) {
            $id = $options["id"];
        } else {
            $id = $this->Form->domId(array(), "for");
        }
        //スクリプト部分
        $script =
            "jQuery(function($){".
            "$(\".".$fieldName."\").datepicker({changeMonth: true,changeYear: true});".
            "});";

        return $ext . $this->Html->scriptBlock($script, array('inline' => false)); }
    }
?>
