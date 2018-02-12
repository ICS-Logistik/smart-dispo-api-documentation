import http.client

conn = http.client.HTTPConnection("smart-dispo-dev,firebaseapp,com")

headers = {
    'Content-Type': "application/json",
    'Cache-Control': "no-cache"
    }

conn.request("DELETE", "api,v1,container_tasks", headers=headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))