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
$endpoint = new MailWizzApi_Endpoint_Customers();

/*===================================================================================*/

// CREATE CUSTOMER
$response = $endpoint->create(array(
    'customer' => array(
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'email'      => 'john.doetest@doe.com',
        'password'   => 'superDuperPassword',
        'timezone'   => 'UTC',
        'birthDate' => '01-06-1996'
    ),
    // company is optional, unless required from app settings
    'company'  => array(
        'name'     => 'John Doe LLC',
        'country'  => 'United States', // see the countries endpoint for available countries and their zones
        'zone'     => 'New York', // see the countries endpoint for available countries and their zones
        'city'     => 'Brooklyn',
        'zip_code' => 11222,
        'address_1'=> 'Some Address',
        'address_2'=> 'Some Other Address',
    ),
));

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';
die;


// Get Customer Details CUSTOMER
// ------------------------------------------------------------
// $customer_id=4;
// $customerDetails = $endpoint->getDetails($customer_id);

// -----------------------------------------------------------
// create Api Key for customer

// $customer_id=4;
// $customerKeyCreate = $endpoint->createApiKey(['customer_id'=>$customer_id]);


// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($customerKeyCreate->body);
echo '</pre>';
