# 🚀 Expl'Orientation

**Expl'Orientation** est une application web interactive conçue pour aider les élèves à découvrir leur profil professionnel en utilisant la méthode **RIASEC** (Réaliste, Investigateur, Artistique, Social, Entreprenant, Conventionnel). 

L'application est connectée aux données officielles de l'**ONISEP** via l'API de `data.gouv.fr`, permettant d'explorer des métiers concrets et à jour.

![Docker](https://img.shields.io/badge/Docker-Ready-brightgreen.svg)
![PHP](https://img.shields.io/badge/PHP-8.2-777bb4.svg)
![Tailwind](https://img.shields.io/badge/Tailwind-CSS-38B2AC.svg)

---

## 🌟 Fonctionnalités

* **Test RIASEC Complet** : Un questionnaire de 30 questions pour déterminer les dominantes de personnalité.
* **Résultats Dynamiques** : Affichage des deux profils les plus forts avec des descriptions détaillées et des pourcentages d'affinité.
* **Détection de Profils Hybrides** : En cas d'égalité parfaite entre deux catégories, une section spéciale propose des métiers croisant les deux univers.
* **Connexion API ONISEP** : Importation et classement automatique des métiers depuis la base "Idéo-Métiers".
* **Interface Responsive** : Design moderne "Nebula" optimisé pour tous les écrans, du smartphone à la résolution 4K.
* **Mode Hors-ligne** : Une base de métiers de secours est intégrée si le fichier JSON local est absent.

---

## 🏗️ Architecture Technique

L'application repose sur une architecture à deux composants pour garantir performance et stabilité :

1.  **Le Back-office (`admin.php`)** : Un script PHP qui télécharge le JSON officiel de l'ONISEP et le stocke localement dans `metiers.json`. Cela élimine les problèmes de CORS et de latence pour les utilisateurs.
2.  **Le Front-office (`index.html`)** : Une Single Page Application (SPA) rapide utilisant JavaScript (ES6) et Tailwind CSS pour consommer les données locales.

---

## 🐳 Déploiement Docker

Le projet est conçu pour être déployé simplement avec Docker.

### Configuration `docker-compose.yml`

```yaml
services:
  explorientation:
    image: php:8.2-apache
    container_name: explorientation
    ports:
      - "8891:80" //port 8891 à adapter
    volumes:
      - /home/apache/explorientation:/var/www/html/
    restart: unless-stopped
