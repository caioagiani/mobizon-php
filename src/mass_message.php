<?php

require "lib/mobizon.php";

$campaignCode = "";
$enviroments = parse_ini_file('../.env');
$init = new Mobizon($enviroments["API_KEY"]);

/**
 * Creating of a new campaign.
 * [Method campaign#Create*]{@link https://mobizon.com.br/en/help/api-docs/campaign#Create}
 * */
$campaignCreate = $init->call("campaign", "create", [
  "data" => [
    "type" => 3,
    "from" => "",
    "text" => "Mobizon: {name}, use o cupom: {cupom}."
  ]
]);

$decode = json_decode($campaignCreate, true);
$campaignCode = $decode["data"];

/**
 * Adding recipients to a bulk SMS campaign.
 * [Method campaign#AddRecipients*]{@link https://mobizon.com.br/en/help/api-docs/campaign#AddRecipients}
 * */
$campaignAddRecipients = $init->call("campaign", "AddRecipients", [
  "id" => $campaignCode,
  "recipients" => [
    [
      "recipient" => 5511941439844,
      "name" => "Caio Agiani",
      "cupom" => "IHJSHGYTYU",
    ],
    [
      "recipient" => 5511941439844,
      "name" => "Mobizon",
      "cupom" => "IIIAGG112",
    ]
  ]
]);

/**
 * Launching of the campaign.
 * [Method campaign#Send*]{@link https://mobizon.com.br/en/help/api-docs/campaign#Send}
 * */
$campaignSend = $init->call("campaign", "Send", [
  "id" => $campaignCode
]);


echo $campaignSend;