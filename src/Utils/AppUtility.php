<?php
namespace App\Utils;

/**
 * AppUtility.
 */
class AppUtility
{
    /*
     * function
     */
/*
    public static function add($val1, $val2){
        return ($val1 + $val2);
    }
*/
    public static function get_works_on_str($val) {

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
