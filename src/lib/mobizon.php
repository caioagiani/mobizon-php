<?php

/**
 * @link https://mobizon.com.br/api
 * @link https://mobizon.docs.apiary.io
 * @link https://github.com/mobizon/mobizon-php
 * */
class Mobizon 
{
  private $apiKey;
  private $apiUrl;

  /**
   * Setup Mobizon API
   * @param string $apiKey, $apiUrl
   **/
  public function __construct($apiKey, $apiUrl = "https://api.mobizon.com.br") 
  {
    $this->apiKey = $apiKey;
    $this->apiUrl = $apiUrl;
  }

  /**
   * @param mixed $provider, $method, $post, $header
   * */
  public function call($provider, $method, $post = null)
  {
    $ch = curl_init("{$this->apiUrl}/service/{$provider}/{$method}?output=json&api=v1&apiKey={$this->apiKey}");

    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      "Content-Type: application/x-www-form-urlencoded",
      "Cache-control: no-cache"
    ]);

    if ($post) {
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    }

    $result = curl_exec($ch);

    curl_close($ch);

    return $result;
  }
}