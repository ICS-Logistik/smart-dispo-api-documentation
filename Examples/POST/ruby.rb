require 'uri'
require 'net/http'

url = URI("https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618")

http = Net::HTTP.new(url.host, url.port)

request = Net::HTTP::Post.new(url)
request["Content-Type"] = 'application/json'
request["Cache-Control"] = 'no-cache'
request.body = "{\n    \"conWeight\": \"1200\",\n    \"conSize\": \"1/40\",\n    \"refNr\": \"4687864\",\n    \"date\": \"2018-02-15\",\n    \"time\": \"2018-02-02T18:15:24\",\n    \"description\": \"test1\",\n    \"isImport\": true,\n    \"retNr\": \"retNr\",\n    \"turnIn\": \"turnIn\",\n    \"contacts\": [\n      {\n        \"name\": \"Tarik Huber\",\n        \"email\":\"tarik.huber@ics-logistik.com\"\n      }\n      ],\n    \"addresses\": [\n        { \n        \t\"company\":\"Google\", \n        \t\"street\":\"Erika-Mann-Straße 33\", \n        \t\"zip\":\"80636\", \n        \t\"country\":\"DE\", \n        \t\"place\":\"München\" \n        \t\n        },\n        { \n        \t\"company\":\"ICS Logistik & Transport GmbH\", \n        \t\"street\":\"Breslauerstr 49\", \n        \t\"zip\":\"83395\", \n        \t\"country\":\"DE\", \n        \t\"place\":\"Freilassing\",\n        \t\"comment\":\"Give it to Tarik\"\n        \t\n        }\n    ]\n}"
response = http.request(request)
puts response.read_body