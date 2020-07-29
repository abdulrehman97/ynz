<?php
if (!defined('ABSPATH')) {
    exit;
}
update_Settings($_POST);
function update_Settings($data){
    if(isset($data['value']['amazon_category']) && isset($data['value']['woo_category']) ){
        update_option('amwscp_'.str_replace(' ','_',$data['value']['amazon_category']),$data['value']['woo_category']);
        echo json_encode(array('status' => true)); exit;
    }
    echo json_encode(array('status' => false)); exit;
}