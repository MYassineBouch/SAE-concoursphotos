# SAE2.3 - Application Concours Photos
```
Par les étudiants du groupe TP2 du BUT1 Réseaux & Télécommunications :
  * Loic Embolo Fouda
  * Jules Messin
  * Mohamed Yassine Bouchama
  * Milan Todorovic
  * Wendlassida Bonkougou
  * Promisse Miansiantima
```
Ce programme est une collaboration entre les étudiants du BUT Mesures physiques et du BUT Réseaux & Télécoms. Cette application est developpée en PHP, HTML, Javascript et CSS.
Le projet a comme but de mettre en valeur la ville de Châtellerault pour son aspect culturel intéressant et captivant. Les étudiants de MP, R&T et TC de Châtellerault peuvent participer à ce concours en se connectant avec leurs identifiants étudiant de l'ENT.
Il est possible de participer avec une seule photo pour chaque étudiant.
Les étudiants ne peuvent voter qu'une seule fois.

L'application suit une architecture MVC (Modèle - Vue - Contrôleur).

**base de données** :
 - adresse : 192.168.156.221
 - nom de la base : tp2_photo
 - login/mdp : < _tous les logins des devs dans ce projet sont valable, actuellement : mbouch46:rt2324@192.168.156.221_ > 

### Contrôleurs
---
Il y a un contrôleur pour chaque page de l'application (présente dans le nav)
- Contrôleur pour l'affichage des photos : ctrl_photo.php
   **fonctionnalités** :
       - la récupération des photos de la base de données et son affichage dans la page des votes
       - l'ajout de la photo et son téléversement vers un fichier choisi (_en ce moment, ce fichier est situé en localhost_)
       - la récupération des méta-données de la photo et leur ajout dans la BD.
- Contrôleur pour gérer les votes
- Contrôleur de recherche
- Contrôleur pour afficher les résultats

### CRUD (models)
---
Il existe un pour chaque fonction du programme
**CRUD gestion de photos :**
 photo_model.php : la récupération des méta-données des photos dans la base de données (**fetch_photos()**) et l'ajout des méta-données uploadées dans la BD (**insert_photo()**)

### Views (les vues)
---
Les vues servent à gérer l'affichage et l'aspect visuel de la page (avec le dossier layout aussi) :
 - page d'accueil : welcome_view.php -> gère l'affichage de la page d'accueil et d'informations.
 - page de vote : photo_view.php -> contient la liste des photos avec la possibilité de voter et un compteur (date limite de vote - codé en JS)
 - page de l'upload : upload_view.php -> contient le formulaire d'envoi de photo avec sa légende.
 - page erreur : 404_view.php -> pour remplacer la page d'erreur PHP.

### Layout et Images
---
Le code CSS de la page et les images utilisées.
global.css -> fichier css pour gérer tout le style de l'application web.
font/ -> gère les polices utilisées.

### index.php
---
L'index est le contrôleur de toute l'architecture MVC utilisée (chef de l'orchestre).
-> contient les liens qui dirige vers les différents fonctionnalités de l'application web et gère l'affichage des pages html en les accordants au contrôleurs associés.

---

## Style et design
**Polices** : Rethink Sans, Helvetica. (publiques et gratuits de google fonts)
