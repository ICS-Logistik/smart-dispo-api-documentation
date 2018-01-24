package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://smart-dispo.firebaseio.com/container_task_api/-KtoyVRMC6H-iXMueBBo/-L-exdQpHII42HpYvD3q/4e543e62-0557-436c-bd78-0fc4af87708b.json"

	payload := strings.NewReader("{\r\n    \"conWeight\": \"1200\",\r\n    \"conSize\": \"1/40\",\r\n    \"refNr\": \"4687864\",\r\n    \"date\": \"2018-02-15\",\r\n    \"time\": \"2018-02-02T18:15:24\",\r\n    \"description\": \"test1\",\r\n    \"isImport\": true,\r\n    \"retNr\": \"retNr\",\r\n    \"turnIn\": \"turnIn\",\r\n    \"contacts\": [\r\n    \t{\"email\":\"tarik.huber@ics-logistik.com\"}\r\n    \t],\r\n    \"address\":{\r\n    \t\"company\": \"ICS Logistik & Transport GmbH\",\r\n    \t\"street\": \"Sudetenplatz 5\",\r\n    \t\"zip\": \"83395\",\r\n    \t\"country\": \"DE\",\r\n    \t\"place\": \"Freilassing\"\r\n    }\r\n}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")
	req.Header.Add("cache-control", "no-cache")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}