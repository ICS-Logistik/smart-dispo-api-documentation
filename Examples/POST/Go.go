package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://smart-dispo-dev.firebaseapp.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618"

	payload := strings.NewReader("{\n    \"conWeight\": \"1200\",\n    \"conSize\": \"1/40\",\n    \"refNr\": \"4687864\",\n    \"date\": \"2018-02-15\",\n    \"time\": \"2018-02-02T18:15:24\",\n    \"description\": \"test1\",\n    \"isImport\": true,\n    \"retNr\": \"retNr\",\n    \"turnIn\": \"turnIn\",\n    \"contacts\": [\n      {\n      \t\"name\": \"Tarik Huber\",\n      \t\"email\":\"tarik.huber@ics-logistik.com\"\n      }\n      ],\n    \"address\":{\n      \"company\": \"ICS Logistik & Transport GmbH\",\n      \"street\": \"Sudetenplatz 5\",\n      \"zip\": \"83395\",\n      \"country\": \"DE\",\n      \"place\": \"Freilassing\"\n    }\n}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("Content-Type", "application/json")
	req.Header.Add("Cache-Control", "no-cache")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}