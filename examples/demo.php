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
$DeliveryServerendpoint = new MailWizzApi_Endpoint_CustomersDeliveryServers();

/*===================================================================================*/

// CREATE CUSTOMER
$response = $endpoint->create(array(
    'customer' => array(
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'email'      => 'sukunjmendpara.mailwizz@mailinator.com',
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
// echo 'pre>';
// $response_data=$response->body->toArray();
// print_r($response_data);
$response_data=$response->body->toArray();
if($response_data['status']=="success"){
    echo "<hr>";
    echo "<hr>";
    echo "<br/>";
    echo '</pre>';
    echo "New Customer Created Successfully, please check following details";
    echo "<br/>";
    echo json_encode($response_data);  
    echo "<hr>";

    // call following endpoint create Api Key for customer
    $customer_id=$response_data['customer_id'];
    $customerKeyCreateResponse = $endpoint->createApiKey(['customer_id'=>$customer_id]);
    $response_data=$customerKeyCreateResponse->body->toArray();

    if($response_data['status']=="success"){
        echo '</pre>';
        echo "New API For Customer Created Successfully, please check following details";
        echo "<br/>";
        echo json_encode($response_data); 
        echo "<hr>";
    }
    else{
        echo '</pre>';
        echo "failed to create API Key for customer";
        echo "<br/>";

        echo json_encode($response_data);  
        echo "<hr>";
    }   

    // Assing New SMTP to this customer.
    if(!empty($customer_id)){

        $delivery_servers_id=18;
        $response = $DeliveryServerendpoint->assingSmtp($delivery_servers_id,$customer_id);
        $response_data=$response->body->toArray();
        if($response_data['status']=="success"){
            echo '</pre>';
            echo "New SMTP has been assinged to the customer successfully, please check following details";
            echo "<br/>";
            echo json_encode($response_data);
            echo "<hr>";
        }
        else{
            echo '</pre>';
            echo "failed to assing SMTP to the customer";
            echo json_encode($response_data);  
            echo "<hr>";
        } 

    }
}
else{
    echo '</pre>';
    echo "failed to create customer";
    echo json_encode($response_data);  
    echo "<hr>";
}   


echo "proccess done!";


// Get Customer Details CUSTOMER
// ------------------------------------------------------------
// $customer_id=4;
// $customerDetails = $endpoint->getDetails($customer_id);

// -----------------------------------------------------------
// create Api Key for customer

// $customer_id=4;
// $customerKeyCreate = $endpoint->createApiKey(['customer_id'=>$customer_id]);


// DISPLAY RESPONSE
// echo '<hr /><pre>';
// print_r($customerKeyCreate->body);
// echo '</pre>';
