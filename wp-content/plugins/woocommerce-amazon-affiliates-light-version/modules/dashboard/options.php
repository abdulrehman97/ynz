<?php
/**
* Return as json_encode
* http://www.aa-team.com
* ======================
*
* @author		Andrei Dinca, AA-Team
* @version		1.0
*/
global $WooZoneLite;
$WooZoneLiteDashboard = WooZoneLiteDashboard::getInstance();
echo json_encode(array(
    $tryed_module['db_alias'] =
        'html_validation' => ($WooZoneLite->get_plugin_status() != 'valid_hash' ? array(
        	'validation' => array(
            'title' => 'Unlock - WooCommerce Amazon Affiliates',
            'icon' => '{plugin_folder_uri}images/validation_icon.png',
            'size' => 'grid_4', // grid_1|grid_2|grid_3|grid_4
            'header' => true, // true|false
            'toggler' => false, // true|false
            'buttons' => false, // true|false
            'style' => 'panel', // panel|panel-widget
            // create the box elements array
            'elements' => array(
                array(
                    'type' => 'message',
                    'status' => 'info',
                    'html' => 'You need to log into your CodeCanyon account and go to your “Downloads” page. Locate this plugin you purchased in your “Downloads” list and click on the “License Certificate” link next to the download link. After you have downloaded the certificate you can open it in a text editor such as Notepad and copy the Item Purchase Code. How to image: <a href="{plugin_folder_uri}images/howto-cc.jpg" target="_blank">link</a>'
                ),
                'productKey' => array(
                    'type' => 'text',
                    'std' => '',
                    'size' => 'large',
                    'title' => 'Item Purchase Code',
                    'desc' => 'Get it from CodeCanyon account and go to your “Downloads” page.'
                ),
                'yourEmail' => array(
                    'type' => 'text',
                    'std' => get_option('admin_email'),
                    'size' => 'large',
                    'title' => 'Your Email',
                    'desc' => 'We will notify you via this email about this product update and bug fix.'
                ),
                'sendActions' => array(
                    'type' => 'buttons',
                    'options' => array(
                        array(
                            'action' => 'WooZoneLite_activate_product',
                            'type' => 'submit',
                            'color' => 'green',
                            'pos' => 'left',
                            'value' => 'Activate now'
                        )
                    )
                )
            )
        ))
        // else
        : $WooZoneLiteDashboard->getBoxes()
    )
));