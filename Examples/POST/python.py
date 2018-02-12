import http.client

conn = http.client.HTTPConnection("smart-dispo-dev,firebaseapp,com")

payload = "{\n    \"conWeight\": \"1200\",\n    \"conSize\": \"1/40\",\n    \"refNr\": \"4687864\",\n    \"date\": \"2018-02-15\",\n    \"time\": \"2018-02-02T18:15:24\",\n    \"description\": \"test1\",\n    \"isImport\": true,\n    \"retNr\": \"retNr\",\n    \"turnIn\": \"turnIn\",\n    \"contacts\": [\n      {\n      \t\"name\": \"Tarik Huber\",\n      \t\"email\":\"tarik.huber@ics-logistik.com\"\n      }\n      ],\n    \"address\":{\n      \"company\": \"ICS Logistik & Transport GmbH\",\n      \"street\": \"Sudetenplatz 5\",\n      \"zip\": \"83395\",\n      \"country\": \"DE\",\n      \"place\": \"Freilassing\"\n    }\n}"

headers = {
    'Content-Type': "application/json",
    'Cache-Control': "no-cache"
    }

conn.request("POST", "api,v1,container_tasks", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))