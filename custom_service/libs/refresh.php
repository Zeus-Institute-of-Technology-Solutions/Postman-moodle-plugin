<?php
require_once 'HTTP/Request2.php';
function refreshToken($refresh) {
  $request = new HTTP_Request2();
  $request->setUrl('KP_BASE_URL/token/refresh/');
  $request->setMethod(HTTP_Request2::METHOD_POST);
  $request->setConfig(array(
    'follow_redirects' => TRUE
  ));
  $request->setBody(json_encode(array(
    'refresh' => $refresh
  )));

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