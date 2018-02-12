# Smart-Dispo API Fields description

* **isImport** - Defines if the task is an import or export task
* **refNr** - Referenz Number
* **conWeight** -  weight of the Container
* **conSize** - size of the Container
* **relNr** - when there is a predefined container number (EXPORT)
* **conNr** - container number (IMPORT)
* **date** - date of the transport task (in the the format YYYY-MM-DD)
* **time** - time of the transport task (in the the format YYYY-MM-DDTHH:mm)
* **out** - depot
* **loadRef** - loading number (EXPORT)
* **description** - all aditional informations for the driver
* **retNr** - delivery referenze (EXPORT) shipping company (IMPORT)
* **dangerousGoods** - (boolean) defines if dangerous goods are transported (ADR transports)
* **heavy** - (boolean) defines if transport is heavier than normal transports
* **isRefrigerated** - (boolean) defines if the goods are refrigerated
* **contacts** - (array) array of contacts with fields `email` and `name`
* **address** - (json object) json object with the target address that has teh fields `company`, `street`, `zip`, `country`, `place`

