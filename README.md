# Smart-Dispo API Documentation

[Smart-Dispo](https://www.smart-dispo.com/) provides a API for importing, changing and canceling transport tasks. All of those actions are triggered by simple [REAST API](https://de.wikipedia.org/wiki/Representational_State_Transfer) calls that are described in this documentation

## Main concept

All actions are triggered with almost the same ways. The content of it defines if a new task will be created, a exsistsing changed or deleted. For the actions to work we need two main parts. The request URL and Body. It is importand to know that the URL stays the same no matter what action we are requesting.

Every action we take is just a request in the Smart-Dispo system that will be stored in a request pool in witch our staff desides witch of them will be accepted or not.

### URL

All actions can be accomplished by calling a simple [POST](https://en.wikipedia.org/wiki/POST_(HTTP)) call to a specific URL. The URL has 5 parts:
* project domain with destination path (https://smart-dispo.firebaseio.com/container_task_api/)
* terminal uid (for example **-KtoyVRMC6H-iXMueBBo**)
* customer uid (for example **-L-exdQpHII42HpYvD3q**)
* customer key (for example **4e543e62-0557-436c-bd78-0fc4af87708b**). This one is not valid but should demonstrate how a key looks like.
* and on the end the **.json**

When we take all this parts together our URL would look like this:

```json
https://smart-dispo.firebaseio.com/container_task_api/-KtoyVRMC6H-iXMueBBo/-L-exdQpHII42HpYvD3q/4e543e62-0557-436c-bd78-0fc4af87708b.json
````

As customer and partner of us you will be provided with the required informations (the uids and the key) above. 

### Body

After our URL is prepared we can work on the data we want to send. The data has to be in the [json](https://www.json.org/) format. Here we have an exmaple of such a `json` body:

```json
{
    "conWeight": "1200",
    "conSize": "1/40",
    "refNr": "4687864",
    "date": "2018-02-15",
    "time": "2018-02-02T18:15:24",
    "description": "test1",
    "isImport": true,
    "retNr": "retNr",
    "turnIn": "turnIn",
    "contacts": [
    	{"email":"tarik.huber@ics-logistik.com"}
    	],
    "address":{
    	"company": "ICS Container-Transport GmbH",
    	"street": "Breslauerstr 49",
    	"zip": "83395",
    	"country": "DE",
    	"place": "Freilassing"
    }
}
```

When we have our URL and Body we are ready to send new transport tasks to the Smart-Dispo system.

## Importing transport tasks

The `json` example above is already everything we need to create a new transport task. It is important to know that most of the fields are optional. There are just 3 of them that are required:
* **isImport**
* **date**
* **address**


If the `POST` call with the URL and Body is accepted you should receive a response with a body like this one:

```json
{
    "name": "-L3bC8ugQ1ULEA_YxCo3"
}
```

It is also just a `json` body with the uid (**-L3bC8ugQ1ULEA_YxCo3**) of you transport task. This one has to be stored in your system so you can refer to it for changes or cancelation.

## Changing transport task

To change a transport task we add to the body another field called **uid** and just those fields we want to change with the new values.
The **uid** field is for changes reuired! Othervise you would just create a new task.
For example if we would like to change the `date` of our task above wou would call the URL with following body:

```json
{
    "uid": "-L3bC8ugQ1ULEA_YxCo3",
    "date": "2018-02-17"
}
```

## Cancelation of a task

Similar to changes for canceling a task we need to povide the **uid** field and a second required field called **cancel**. Both of them are required and all other will be ignored if this two are present. The **cancel** field should just containe `true`.

A cancelation requiest Body for our task above would look like this:

```json
{
    "uid": "-L3bC8ugQ1ULEA_YxCo3",
    "cancel": "true"
}
```

## Failed requests

If any of the uids or the key is not correct the request will fail with the following resposnse:

```json
{
    "error": "Permission denied"
}
```
## Receiving automated feedback from our staff

One field in the body while creating a transprt task has a specific functionality. It is the **contacts** field. Not only that it defines who are the contacts for the task it also defines who will be informed if the request is rejected from our staff.


