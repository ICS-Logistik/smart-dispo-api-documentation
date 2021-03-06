# Smart-Dispo API Documentation

[Smart-Dispo](https://www.smart-dispo.com/) provides an API for importing, changing and canceling transport tasks. All of those actions are triggered by simple [REAST API](https://de.wikipedia.org/wiki/Representational_State_Transfer) calls that are described in this documentation

## Main concept

The `Smart-Dispo` REST API uses all common standards and formats. 

For creating, changing and canceling container tasks we use the HTTP methods POST, PUT and DELETE.

The data in the request body can have all common data formats like `json`, `xml`, `form-data` etc.. We would recommend to use `json` but you are free to chosse any the common formats.

To be able to use this API you would need some informations from us. Some of them like the `URL` are public and others like your personal `Access Key` are private. You would also need informations about the `Terminal ID-s` to be able to send your order to the right staff department.

It's also importand to know that every request from you is creating a request in our application witch has to be accepted manually by our staff. A confirmation that your request is successful doesn't mean that it is already an accepted container transport task.

Let's now take a look how our HTTP request `URL` and `Body` should look like. 

### URL

All actions can be accomplished by calling a simple `HTTP request`. Depending on the `Body` content and `HTTP method` you will be able to create a request for creating a transport task, changing or canceling it. 

The URL has 3 parts:
* **path** https://www.smart-dispo.com/api/v1/container_tasks
* **terminal** (for example **-KtoyVRMC6H-iXMueBBo**). Defines in witch staff department the task request will be send. For example HBG, CTS, MUC etc..
* **key** (for example **4e543e62-0557-436c-bd78-0fc4af87708b**). We give you this `key`.
* **uid** (for exanple **-L3cak9pl6Pm8c0mpSA7**). This one is only needed if you want to update or cancel a task. It is the unique identifier of the task.

When we take all this parts together our URL would look like this for `POST` calls:

```json
https://www.smart-dispo.com/api/v1/container_tasks?terminal=-KtoyVRMC6H-iXMueBBo&key=-L-exdQpHII42HpYvD3q/4e543e62-0557-436c-bd78-0fc4af87708b
```

and like this for `PUT` or `DELETE` calls:
```json
https://smart-dispo.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L3cak9pl6Pm8c0mpSA7
```


### Body

After our URL is prepared we can work on the data we want to send. The data can be in any common format but we would recomment to use the `json` fromat. Here we have an exmaple of such a `json` body for a `POST` request:

```json
{
    "conWeight": "1200",
    "conSize": "1/40",
    "refNr": "4687864",
    "date": "2018-02-15",
    "time": "2018-02-15T18:15:24",
    "description": "test1",
    "isImport": true,
    "retNr": "retNr",
    "turnIn": "turnIn",
    "contacts": [
    	{"email":"tarik.huber@ics-logistik.com"}
    	],
    "addresses": [
        { 
        	"company":"Google", 
        	"street":"Erika-Mann-Straße 33", 
        	"zip":"80636", 
        	"country":"DE", 
        	"place":"München" 
        	
        },
        { 
        	"company":"ICS Logistik & Transport GmbH", 
        	"street":"Breslauerstr 49", 
        	"zip":"83395", 
        	"country":"DE", 
        	"place":"Freilassing",
        	"comment":"Give it to Tarik"
        	
        }
    ]
}
```

[Here](https://github.com/ICS-Logistik/smart-dispo-api-documentation/blob/master/Fields.md) a complete list of all possible fields and their explanation.

If we wan't to change data in an existing task we would provide just the data we wan't to change for example if we would like to change the date in a task the Body would look like this:

```json
{
   "date": "2018-02-16",
}
```
Here it is **importand** to not forget the **uid** in the `URL`!

When we have our URL and Body we are ready to send new transport tasks to the Smart-Dispo system.

## Importing transport tasks

The `json` example above is already everything we need to create a new transport task. It is important to know that most of the fields are optional. There are just 3 of them that are required:
* **date**
* **addresses**

If the `POST` call with the URL and Body is accepted you should receive a response with a body like this one:

```json
{
    "uid": "-L586Gz-nW0phDYGivQr"
}
```

It is also just a `json` body with the uid (**-L586Gz-nW0phDYGivQr**) of your transport task. 

**IMPORTAND:** This `uid` has to be stored in your system so you can refer to it for changes or cancelation.

## Changing transport tasks

To change a transport task we add to the URL another parameter called **uid** and to the Body just those fields we want to change with the new values. It is importand to change the `HTTP method` to **PUT**! For example if we would like to change the `date` of our task above you would call this URL:

```json
https://smart-dispo.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L586Gz-nW0phDYGivQr
```

with this body:

```json
{
   "date": "2018-02-16",
}
```

## Reading transport task data

To get data about a task from the API we use the same url and parameters as we did in the updating part above and just change the call from **PUT** to **GET**. The `terminal` parameter is also not required. That is also a reason the save the task `uid` on the firts **POST**, because we need it for every other call afterwards. Watchng out example the `URL` would be the same:

```json
https://smart-dispo.com/api/v1/container_tasks?terminal=-Ku3IJfkqvagswb450WZ&key=8534c5b8-1bca-4b0f-addc-119a54893618&uid=-L586Gz-nW0phDYGivQr
```

Because we are reading the data from our API the `Body` is not needed in the request and even if you would have one it will be ignored. 
We insted receive as response a large `json` file with 3 main parts:
* **data** - the main data of the transport task
* **statuses** - the workflow statuses of the driver/drivers working on the task in a chronological order and with the locations where they are triggered
* **files** - all task related files witch you as customer are allowed to see with the OCR Text recognised in it and a download link

## Cancelation of a tasks

Similar to changes for canceling a task we need to povide the **uid** in our URL but for a cancelation we don't need any data in the task so we call it with an empty body. It is importand to change the `HTTP method` to **DELETE**!


## Failed requests

If we try to make a request with an invalid `key` we will receive a response with the code **403** and raw body with the content `Wriong key!`


## Receiving automated feedback from our staff

One field in the body while creating a transprt task has a specific functionality. It is the **contacts** field. Not only that it defines who are the contacts for the task it also defines who will be informed if the request is rejected from our staff. This field can also be updated afterwards to add or remove contacts.

Every contact will be also informed if the import, change or cancelation request is not accepted by our staff! Because of that we recommend to have at least one contact.

## Examples

This project has a `Examples` folder. In that we have seperated code examples for the `POST`, `PUT` and `DELETE` requests in **7** of the most used programming languages.

The examples are writen for our development environment witch means that the `URL` has a different domain. The production domain is `https://www.smart-dispo.com` and the development domain `https://smart-dispo-dev.firebaseapp.com`. Don't forget to change this in your code. 

The reaoson we are using the development server in the examples is that it allows you to test your code with our test environment. All the Examples should work and you should receive successful responses on them. Feel free to play with the examples and to run the example code in your projects.

If you want to test the HTTP request manually I would recomment o use [Postamn](https://www.getpostman.com/) for that.

## Contact and support

For any kind of questions or support pleas contact me via E-Mail or office phone.

E-Mail: **tarik.huber@ics-logistik.com**
Office phone: **0049 8654 46 97 66**




