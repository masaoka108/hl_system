<?php
class OrderHelper extends AppHelper {

    function __call($methodName, $args) {
        App::import('Component', 'Order');

        $order = new OrderComponent(new ComponentCollection());
        return call_user_func_array(array($order, $methodName), $args);
    }
}

}
 ?>
