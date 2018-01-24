<?php

$request = new HttpRequest();
$request->setUrl('https://smart-dispo.firebaseio.com/container_task_api/-KtoyVRMC6H-iXMueBBo/-L-exdQpHII42HpYvD3q/4e543e62-0557-436c-bd78-0fc4af87708b.json');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'cache-control' => 'no-cache',
  'content-type' => 'application/json'
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
    	{"email":"tarik.huber@ics-logistik.com"}
    	],
    "address":{
    	"company": "ICS Logistik & Transport GmbH",
    	"street": "Sudetenplatz 5",
    	"zip": "83395",
    	"country": "DE",
    	"place": "Freilassing"
    }
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}