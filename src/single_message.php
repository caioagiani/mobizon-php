<?php

require "lib/mobizon.php";

$enviroments = parse_ini_file('../.env');

$init = new Mobizon($enviroments["API_KEY"]);

/**
 * Sending of a single message.
 * [Method message#SendSmsMessage*]{@link https://mobizon.com.br/en/help/api-docs/message#SendSmsMessage}
 * */
$singleMessage = $init->call("message", "SendSmsMessage", [
  "recipient" => "5511941439844",
  "text" => "SMS Enviado via API Mobizon"
]);

echo $singleMessage;