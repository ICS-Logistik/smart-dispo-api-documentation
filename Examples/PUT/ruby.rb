require 'uri'
require 'net/http'

url = URI("https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L1RbsdCarBV4BG2e2yA")

http = Net::HTTP.new(url.host, url.port)

request = Net::HTTP::Put.new(url)
request["Content-Type"] = 'application/json'
request["Cache-Control"] = 'no-cache'
request.body = "{\n    \"date\": \"2018-02-20\",\n    \"description\": \"test123\"\n}"

response = http.request(request)
puts response.read_body