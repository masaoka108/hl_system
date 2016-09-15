<?php
namespace App\View\Helper;
use Cake\View\Helper;

class OrderHelper extends Helper {
    function __call($methodName, $args) {
        //App::import('Component', 'Order');
        //$order = $this->view->controller->OrderComponent->method();
        //$path= $_SERVER[‘DOCUMENT_ROOT’]."/hl_system/src/Controller/Component/OrderComponent.php";
        //$path= "C:/Apache24/htdocs/hl_system/src/Controller/Component/OrderComponent.php";
        //$this->loadComponent('Order');

        //include($path);


        //$order = new OrderComponent(new ComponentCollection());
        return call_user_func_array(array($order, $methodName), $args);
    }
}

?>
