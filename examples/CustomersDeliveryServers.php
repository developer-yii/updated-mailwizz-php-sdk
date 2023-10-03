<?php
/**
 * This file contains examples for using the MailWizzApi PHP-SDK.
 *
 * @author Serban George Cristian <cristian.serban@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright 2013-2020 https://www.mailwizz.com/
 */
 
// require the setup which has registered the autoloader
require_once dirname(__FILE__) . '/setup.php';

// CREATE THE ENDPOINT
$endpoint = new MailWizzApi_Endpoint_CustomersDeliveryServers();
/*===================================================================================*/

// CREATE Delivery Server
$data = [
    'DeliveryServerSmtp' => [
        'name' => 'Mail server two',
        'hostname' => 'sandbox.smtp.mailtrap.io',
        'username' => 'john.doe@mailinator.com',
        'password' => 'superDuperPassword',
        'port' => '25',
        'protocol' => '',
        'from_email' => 'radheshyam.amcodr@gmail.com',
        'from_name' => 'Radheshyam',
        'probability' => '100',
        'hourly_quota' => '0',
        'daily_quota' => '0',
        'monthly_quota' => '0',
        'pause_after_send' => '0',
        'bounce_server_id' => '',
        'tracking_domain_id' => '',
        'use_for' => 'all',
        'signing_enabled' => 'yes',
        'force_from' => 'always',
        'force_sender' => 'no',
        'reply_to_email' => '',
        'force_reply_to' => 'never',
        'max_connection_messages' => '1',
        // 'customer_id' => '4',
        'locked' => 'no',
        'warmup_plan_id' => '',
    ],
    'customer' => 'Radheshyam Gohel',
    'warmup-plan' => '',
    'DeliveryServerSmtpType' => 'smtp',
];
$response = $endpoint->create($data);

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';


// update Delivery Server details
$delivery_servers_id=15;
$data = [
    'DeliveryServerSmtp' => [
        'name' => 'Mail server two',
        'hostname' => 'sandbox.smtp.mailtrap.io',
        'username' => 'john.doeupdate@mailinator.com',
        'password' => 'superDuperPassword',
        'port' => '25',
        'protocol' => '',
        'from_email' => 'radheshyam.amcodr@gmail.com',
        'from_name' => 'Radheshyam',
        'probability' => '100',
        'hourly_quota' => '0',
        'daily_quota' => '0',
        'monthly_quota' => '0',
        'pause_after_send' => '0',
        'bounce_server_id' => '',
        'tracking_domain_id' => '',
        'use_for' => 'all',
        'signing_enabled' => 'yes',
        'force_from' => 'always',
        'force_sender' => 'no',
        'reply_to_email' => '',
        'force_reply_to' => 'never',
        'max_connection_messages' => '1',
        'customer_id' => '4',
        'locked' => 'no',
        'warmup_plan_id' => '',
    ],
    'customer' => 'Radheshyam Gohel',
    'warmup-plan' => '',
    'DeliveryServerSmtpType' => 'smtp',
];

// $response = $endpoint->update($delivery_servers_id,$data);

// // DISPLAY RESPONSE
// echo '<hr /><pre>';
// print_r($response->body);
// echo '</pre>';

// // delete specific server.
// $delivery_servers_id=2;
// $response = $endpoint->delete($delivery_servers_id);

// // DISPLAY RESPONSE
// echo '<hr /><pre>';
// print_r($response->body);
// echo '</pre>';