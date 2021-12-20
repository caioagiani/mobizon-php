<!--
/*
 * Obrigado por baixar este projeto, caso tenha alguma ideia, ajustes, etc...
 * dê um fork no repositório e crie uma Pull Request.
 */
-->

<p align="center">
  <a href="https://mobizon.com.br">
    <img src=".github/default.svg" width="60%" alt="Mobizon" title="Mobizon">
  </a>
</p>

<h2 align="center">Biblioteca para comunicação API HTTP Mobizon SMS</h2>

<p align="center">
  <img alt="GitHub language count" src="https://img.shields.io/github/languages/count/caioagiani/mobizon-php">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/caioagiani/mobizon-php">
  <img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/caioagiani/mobizon-php">
  <img alt="GitHub license" src="https://img.shields.io/badge/license-MIT-blue.svg">
</p>

## Instalação

- Baixe o PHP em [php.net](https://www.php.net/downloads.php) e instale-o, caso ainda não tenha.

- Obtenha sua chave em: https://mobizon.com.br/api

## Configuração:

```php
require "lib/mobizon.php";

$init = new Mobizon(
  "SUA_API_KEY",
  "https://api.mobizon.com.br"
);

$singleMessage = $init->call("message", "SendSmsMessage", [
  "recipient" => "5511941439844",
  "text" => "SMS Enviado via API Mobizon"
]);

echo $singleMessage;
```

## Licença

Documentação [pt-BR](https://mobizon.docs.apiary.io/).<br />
Copyright © 2021 [caioagiani](https://github.com/caioagiani).<br />
Este projeto é licenciado [MIT](https://github.com/caioagiani/mobizon-node/blob/master/LICENSE).
