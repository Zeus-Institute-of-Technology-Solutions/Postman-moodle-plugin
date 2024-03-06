<?php
require_once 'HTTP/Request2.php';
function getClientToken($client_key, $client_secret) {
  $request = new HTTP_Request2();
  $request->setUrl('https://sandbox-api.website.in/api/v1/lms/client/token/');
  $request->setMethod(HTTP_Request2::METHOD_POST);
  $request->setConfig(array(
    'follow_redirects' => TRUE
  ));
  $request->addPostParameter(array(
    'client_key' => $client_key,
    'client_secret' => $client_secret
  ));

  try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
      return $response->getBody();
    }
    else {
      throw new Exception('Unexpected HTTP status: ' . $response->getStatus() . ' ' .
      $response->getReasonPhrase());
    }
  }
  catch(HTTP_Request2_Exception $e) {
    throw new Exception('Error: ' . $e->getMessage());
  }
}