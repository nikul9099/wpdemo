<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

class Wt_Advanced_Order_Number_Deactivator {

    public static function deactivate() {

    	do_action("wt_advanced_order_number_deactivate");
        
    }

}
