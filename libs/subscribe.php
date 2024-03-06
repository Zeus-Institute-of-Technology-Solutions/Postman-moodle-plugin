<?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('KP_BASE_URL/nm/api/course/subscribe/');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'Content-Type' => 'application/json'
));
$request->setBody('{\n	"user_id" : "_UNQIUE_STUDENT_<redacted>",\n	"course_id":"UNQIUE_COURSE_ID"\n}');
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
    echo $response->getBody();
  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}