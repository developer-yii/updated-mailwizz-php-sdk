<?php
/**
 * This file contains the customers endpoint for MailWizzApi PHP-SDK.
 *
 * @author Serban George Cristian <cristian.serban@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright 2013-2020 https://www.mailwizz.com/
 */
 
 
/**
 * MailWizzApi_Endpoint_Customers handles all the API calls for customers.
 *
 * @author Serban George Cristian <cristian.serban@mailwizz.com>
 * @package MailWizzApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailWizzApi_Endpoint_CustomersDeliveryServers extends MailWizzApi_Base
{
    /**
     * Create a new mail list for the customer
     *
     * The $data param must contain following indexed arrays:
     * -> customer
     * -> company
     *
     * @param array $data
     *
     * @return MailWizzApi_Http_Response
     * @throws ReflectionException
     */
    public function create(array $data)
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers/create'),
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }
    public function getList(array $data)
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers/create'),
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }
    public function update($server_id,array $data)
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers').'/update?server_id='.$server_id,
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }
    public function delete($server_id)
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers').'/delete?server_id='.$server_id,
            'paramsPost'    => [],
        ));
        
        return $response = $client->request();
    }
    public function assingSmtp($server_id,$customer_id)
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers').'/assign_smtp?server_id='.$server_id.'&customer_id='.$customer_id,
            'paramsPost'    => [],
        ));
        
        return $response = $client->request();
    }
    public function getUnassignedServer()
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers').'/get_unassigned_server',
            'paramsPost'    => [],
        ));
        
        return $response = $client->request();
    }
    public function getAllUnassignedServer()
    {
        $client = new MailWizzApi_Http_Client(array(
            'method'        => MailWizzApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customer_delivery_servers').'/index?assign_status=unassigned',
            'paramsPost'    => [],
        ));
        
        return $response = $client->request();
    }
    
}