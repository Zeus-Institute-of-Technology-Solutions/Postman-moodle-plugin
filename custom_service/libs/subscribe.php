<?php
require_once 'HTTP/Request2.php';

function subscribeToCourse($uniqueStudentId, $uniqueCourseId) {

  $request = new HTTP_Request2();
  $request->setUrl('KP_BASE_URL/nm/api/course/subscribe/');
  $request->setMethod(HTTP_Request2::METHOD_POST);
  $request->setConfig(array(
    'follow_redirects' => TRUE
  ));
  $request->setHeader(array(
    'Content-Type' => 'application/json'
  ));

  $requestBody = array(
    'user_id' => $uniqueStudentId,
    'course_id' => $uniqueCourseId
  );

  $request->setBody(json_encode($requestBody));

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