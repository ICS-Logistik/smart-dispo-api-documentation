import http.client

conn = http.client.HTTPSConnection("smart-dispo-dev.firebaseapp.com")

headers = {
    'content-type': "application/json",
    'cache-control': "no-cache"
    }

conn.request("GET", "/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L1RbsdCarBV4BG2e2yA", headers=headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))