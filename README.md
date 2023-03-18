# Software in construction
# CoachAgendaPro
**CoachAgendaPro est un logiciel de club sportif, il permet la gestion intégrale des membres, matchs et plus encore**  
**CoachAgendaPro is a sports club software, it allows the integral management of members, matches and more**
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/Ordi%20%2B%20Tel.png)
## Table Of Contents
 - Presenation of features
   - Match management
   - Training management
   - Team/member management
   - Stadium management
   - Communication with club members
   - Sharing space
 - Installation
 - Contact Me
 - Licenses

## Features
Here are the features of CoachAgendaPro
### Match management
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/matchs%20passe.PNG)
A simple display on the next upcoming matches  
But also past matches with the score as well as the possibility of importing a match sheet and making 
it accessible to team members  
  
Un affichage simple sur les prochains matchs à venir  
Mais aussi les matchs passé avec le score ainsi que la possibilité d’importer une feuille de match et la 
rendre accessible aux membres de l’équipe  
### Training management
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/entrainements.PNG)
No doubt about the time or place of training  
The training times are reminded on the members’ area  
  
Plus de doute possible sur l’heure ou le lieu d’entrainements  
Les horaires d’entrainements sont rappelés sur l’espace membres  
### Team/member management
Managing your members and teams has never been easier  
In a few clicks you can add a member to a team  
Easily move members to another team  
Modification of the teams even in the middle of the season  
  
Gérer vos membres et vos équipes n’a jamais été aussi simple  
En quelques clics vous pouvez ajouter un membre à une équipe  
Déplacement facile de membres vers une autre équipe  
Modification des équipes mêmes en pleine saison  
### Stadium management
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/stades.PNG)
CoachAgendaPro allows you to easily manage your stadiums, and allows your members to get there 
thanks to Google Maps GPS guidance  
  
CoachAgendaPro vous permet de gérer facilement vos stades, et permet à vos membres de s’y 
rendre grâce au guidage GPS Google Maps  
### Communication with club members
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/notif.PNG)
You can easily alert or pass on information  
CoachAgendaPro sends a notification to the member area  
7 notification colors are available depending on the importance of the notification  
  
Vous pouvez facilement alerter ou faire passer une information  
CoachAgendaPro envoie une notification sur l’espace membre  
7 couleurs de notifications sont disponibles selon l’importance de celle-ci  
### Sharing space
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/echanges.PNG)
A space for exchanges is present on the members’ area, it allows the whole club to exchange the 
highlights of a match  
This space can be moderated in the event of a problem from the coach space  
  
Un espace d’échanges est présent sur l’espace membres et l’espace coach, il permet à tout le club 
d’échanger les moments forts d’un match  
Cet espace peut être modéré en cas de débordement depuis l’espace coach  
## Installation
This section explains how to correctly install CoachAgendaPro on your web server  
To begin, it is necessary to complete the database connection information in the config.php file.  
  
Cette section vous explique comment installer correctement CoachAgendaPro sur votre serveur web.  
Pour commencer il est nécessaire de compléter les informations de connexions à la base de données
dans le fichier config.php  
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/Config.png)
For security reasons CoachAgendaPro automatically generates and sends the password of future 
members, it is therefore imperative to have a mail server supporting the PHPMail function (ex: 
Postfix)  
  
Pour des raisons de sécurité CoachAgendaPro génère et envoie de façon automatique le mot de 
passe des futurs membres, il est donc impératif d’avoir un serveur mail prenant en charge la fonction 
PHPMail (ex : Postfix)  
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/mail.png)
To enable GPS navigation to stadiums CoachAgendaPro needs to know the exact GPS coordinates of 
the stadium.  
For this CoachAgendaPro uses Microsoft’s Bing Maps API  
This API has the advantage of being free under a certain large number of requests per day  
  
Pour permettre la navigation GPS vers les stades CoachAgendaPro a besoin de connaitre les 
coordonnées GPS exactes du stade.  
Pour cela CoachAgendaPro utilise l’API Bing Maps de Microsoft  
Cette API présente l’avantage d’être gratuite sous un certain nombre important de requête par jour  
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/gps.png)
To be able to use it you will have to obtain an API key  
This procedure is detailed in the following steps:  
Go to the website: https://www.bingmapsportal.com/  
Create an account  
Once on the dashboard, go to the “My Account” tab then “My keys”   
Click on «Create new key» 
Complete the form as follows:  
![](https://raw.githubusercontent.com/ludovic-ggn/CoachAgendaPro/main/Project%20Picture/cle.PNG)  
Pour pouvoir l’utiliser vous allez devoir obtenir une clé API  
Cette procédure est détaillée dans les étapes suivantes :  
Allez sur le site : https://www.bingmapsportal.com/  
Créez un compte  
Une fois sur le tableau de bord, allez dans l’onglet «My Account » puis « My Keys»  
Cliquez sur «Create new key»  
Complétez le formulaire comme ci-dessus
