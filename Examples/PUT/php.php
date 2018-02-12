<?php

$request = new HttpRequest();
$request->setUrl('https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks');
$request->setMethod(HTTP_METH_PUT);

$request->setQueryData(array(
  'terminal' => '-Ku3IJfkqvagswb450WZ',
  'key' => '8534c5b8-1bca-4b0f-addc-119a54893618',
  'uid' => '-L1RbsdCarBV4BG2e2yA'
));

$request->setHeaders(array(
  'Cache-Control' => 'no-cache',
  'Content-Type' => 'application/json'
));

$request->setBody('{
    "date": "2018-02-20",
    "description": "test123"
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}