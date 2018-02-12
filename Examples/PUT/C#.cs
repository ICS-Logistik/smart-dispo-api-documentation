var client = new RestClient("https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L1RbsdCarBV4BG2e2yA");
var request = new RestRequest(Method.PUT);
request.AddHeader("Cache-Control", "no-cache");
request.AddHeader("Content-Type", "application/json");
request.AddParameter("undefined", "{\n    \"date\": \"2018-02-20\",\n    \"description\": \"test123\"\n}", ParameterType.RequestBody);
IRestResponse response = client.Execute(request);