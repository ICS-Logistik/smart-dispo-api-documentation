<?php

$request = new HttpRequest();
$request->setUrl('https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks');
$request->setMethod(HTTP_METH_POST);

$request->setQueryData(array(
  'terminal' => '-Ku3IJfkqvagswb450WZ',
  'key' => '8534c5b8-1bca-4b0f-addc-119a54893618'
));

$request->setHeaders(array(
  'Cache-Control' => 'no-cache',
  'Content-Type' => 'application/json'
));

$request->setBody('{
    "conWeight": "1200",
    "conSize": "1/40",
    "refNr": "4687864",
    "date": "2018-02-15",
    "time": "2018-02-02T18:15:24",
    "description": "test1",
    "isImport": true,
    "retNr": "retNr",
    "turnIn": "turnIn",
    "contacts": [
      {
      	"name": "Tarik Huber",
      	"email":"tarik.huber@ics-logistik.com"
      }
      ],
      "addresses": [
        { 
        	"company":"Google", 
        	"street":"Erika-Mann-Straße 33", 
        	"zip":"80636", 
        	"country":"DE", 
        	"place":"München" 
        	
        },
        { 
        	"company":"ICS Logistik & Transport GmbH", 
        	"street":"Breslauerstr 49", 
        	"zip":"83395", 
        	"country":"DE", 
        	"place":"Freilassing",
        	"comment":"Give it to Tarik"
        	
        }
    ]
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}