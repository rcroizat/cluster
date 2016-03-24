#API Cluster


## Website
### Créer un Website

	[POST] /1/website

#### Valeurs
Variable	| Type    	| Description
------- 	| -------	|------------
name 	    | String 	| Nom du site
url		    | String	| Url du site
description | String    | Description du site
id_type     | Integer   | Id du type du site
id_theme	| Integer	| Id du theme du site

#### Exemple	

##### Requête :

* name = TondeuseShare
* url = tondeuse-share
* description = Partage de tondeuse
* id_type = 1
* id_theme = 2

##### Retour :

	{
        "id": 123
    }
	
### Récupérer les infos d'un website

	[GET] /1/website/:id

#### Paramètres	
	
Champs  | Type    | Description
------- | ------- |------------
id	    | String  | L'ID du website

#### Exemple
	[GET] /1/website/123
##### Retour :
    {
        "id": "123",
        "name": "TondeuseShare",
        "url": "tondeuse-share",
        "description": "Partage de tondeuse",
        "id_type": "1",
        "id_theme": "2"
    }