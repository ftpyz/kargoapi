<?php
require_once 'vendor/autoload.php';

use KargoApi\Firma\Yurtici\YurtIciKargo;
$c = new YurtIciKargo('6058N554031720G', 'UHs6GaR07Pg70853');

$cargokey = rand(1111111111, 9999999999);
$gonderimBilgileri = array(
    'cargoKey' => $cargokey,
    'invoiceKey' => "DENEME",
    'receiverCustName' => "DENEME DENEME",
    'receiverAddress' => "DENEME DENEME",
    'cityName' => "DENEME",
    'townName' => "DENEME",
    'receiverPhone1' => "DENEME",
    'receiverPhone2' => "DENEME",
    'receiverPhone3' => "DENEME",
    'emailAddress' => "info@umitkatmer.com.tr",
    'taxOfficeId' => '',
    'taxNumber' => "",
    'taxOfficeName' => "",
    'desi' => "",
    'kg' => "",
    'cargoCount' => '',
    'waybillNo' => "", //Sevk İrsaliye No (Ticari gönderilerde zorunludur)
    'specialField1' => "",
    'specialField2' => "",
    'specialField3' => "",
    'ttInvoiceAmount' => "",
    'ttDocumentId' => '',
    'ttCollectionType' => "",
    'ttDocumentSaveType' => "",
    'dcSelectedCredit' => "",
    'dcCreditRule' => '',
    'description' => "",
    'orgGeoCode' => "",
    'privilegeOrder' => "",
    'custProdId' => "",
    'orgReceiverCustId' => "",
);
var_dump($c->createShipment($gonderimBilgileri));
