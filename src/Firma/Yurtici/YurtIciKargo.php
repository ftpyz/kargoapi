<?php

namespace KargoApi\Firma\Yurtici;

use SoapClient;

class YurticiKargo
{
    private $username;
    private $password;
    private $lang = 'TR';
    private $mod = 'test';
    private $apiAuth;

    private $backendUrl = array(
        "test" => array(
            'shippingOrderDispatcherServices' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/ShippingOrderDispatcherServices?wsdl',
            'saveNgiCustomerAddress' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/ NgiCustomerAddressServices?wsdl',
            'createNgiShipment' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'createNgiShipmentWithAddress' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'updateShipmentDesiWeight' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'cancelNgiShipment' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'selectShipment' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'listInvDocumentInterfaceWithReference' => 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/WsReportWithReferenceServices?wsdl',
        ),
        "live" => array(
            'shippingOrderDispatcherServices' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/ShippingOrderDispatcherServices?wsdl',

            'saveNgiCustomerAddress' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/NgiCustomerAddressServices?wsdl',
            'createNgiShipment' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'createNgiShipmentWithAddress' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'updateShipmentDesiWeight' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'cancelNgiShipment' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'selectShipment' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/NgiShipmentInterfaceServices?wsdl',
            'listInvDocumentInterfaceWithReference' => 'http://webservices.yurticikargo.com:8080/KOPSWebServices/WsReportWithReferenceServices?wsdl',
        ),
    );

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->apiAuth = array(
            "wsUserName" => $username,
            "wsPassword" => $password,
            "userLanguage" => $this->lang,
        );
    }

    public function initClient($method)
    {
        $baseUrl = $this->$mod == 'test' ? $this->backendUrl['test'][$method] : $this->backendUrl['live'][$method];
        $this->client = new SoapClient($baseUrl, array("trace" => 1, "exception" => 0));

    }
    public function kullaniciBilgileri()
    {
        $kullaniciSopa = '';
    }
    /*Fiziken sevk edilmiş, Taşıma irsaliyesi / gönderilerin durumu ve kargo hareketlerinin sorgulanmasına imkan verir. */
    public function listInvDocumentInterfaceWithReference()
    {
        $query = '';
    }
    /* Siparis no ile yeni gönderi oluşturur*/
    public function createShipment($SiparisNo)
    {

        $data = array_merge(
            $this->apiAuth,
            array("ShippingOrderVO" => $SiparisNo)
        );

        $this->initClient('shippingOrderDispatcherServices');
        return $this->client->createShipment($data);
    }
    /* Siparis no ile yeni gönderiyi iptaleder*/
    public function cancelShipment($cargoKeys)
    {
        $data = array_merge(
            $this->apiAuth,
            array("cargoKeys" => $cargoKeys)
        );

        $this->initClient('shippingOrderDispatcherServices');
        return $this->client->cancelShipment($data);
    }
}
