var client = new RestClient("https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L1RbsdCarBV4BG2e2yA");
var request = new RestRequest(Method.GET);
request.AddHeader("cache-control", "no-cache");
request.AddHeader("content-type", "application/json");
IRestResponse response = client.Execute(request);