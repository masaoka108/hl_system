<?php
namespace App\View\Helper;
use Cake\View\Helper;

class ColorHelper extends Helper {
    public function red($string) {
        return '<span style="color:red">' . $string . '</span>';
    }
}
