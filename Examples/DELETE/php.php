<?php

$request = new HttpRequest();
$request->setUrl('https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks');
$request->setMethod(HTTP_METH_DELETE);

$request->setQueryData(array(
  'terminal' => '-Ku3IJfkqvagswb450WZ',
  'key' => '8534c5b8-1bca-4b0f-addc-119a54893618',
  'uid' => '-L1RbsdCarBV4BG2e2yA'
));

$request->setHeaders(array(
  'Cache-Control' => 'no-cache',
  'Content-Type' => 'application/json'
));

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}