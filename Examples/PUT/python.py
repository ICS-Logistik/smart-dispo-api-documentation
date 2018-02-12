import http.client

conn = http.client.HTTPConnection("smart-dispo-dev,firebaseapp,com")

payload = "{\n    \"date\": \"2018-02-20\",\n    \"description\": \"test123\"\n}"

headers = {
    'Content-Type': "application/json",
    'Cache-Control': "no-cache"
    }

conn.request("PUT", "api,v1,container_tasks", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))