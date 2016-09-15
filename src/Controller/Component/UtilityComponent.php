<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

class UtilityComponent extends Component {
     public function getHello() {
          return "hello world!";
     }

     public $arRPM = array(
         "33" => "33",
         "45" => "45"
         );

     public $arWorks = array(
         "1" => "有",
         "0" => "無"
         );


}
?>
