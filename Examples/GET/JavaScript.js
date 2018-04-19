var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L1RbsdCarBV4BG2e2yA",
  "method": "GET",
  "headers": {
    "content-type": "application/json",
    "cache-control": "no-cache"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});