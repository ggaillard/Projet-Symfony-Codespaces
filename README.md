# Tutorials, Fortune Cookies & Doctrine Queries

Ce dépôt contient le code et le script pour les [tutoriels sur les requêtes Doctrine](https://symfonycasts.com/screencast/doctrine-queries) sur SymfonyCasts.

## Configuration
## Setup

Pour le faire fonctionner, suivez ces étapes :

**Télécharger les dépendances de Composer**

Assurez-vous d'avoir [installé Composer ](https://getcomposer.org/download/) 
et exécutez ensuite :

```bash
composer install
```

Vous devrez éventuellement exécuter php composer.phar install, 
selon comment vous avez installé Composer.

**Configuration de la base de données**

Le code est livré avec un fichier docker-compose.yaml et nous recommandons
d'utiliser Docker pour démarrer un conteneur de base de données. 
PHP sera toujours installé en local, mais vous vous connecterez à une base de données
 à l'intérieur de Docker. C'est facultatif, mais je pense que vous allez l'adorer !

Tout d'abord, assurez-vous d'avoir Docker installé et en cours d'exécution. 
Pour démarrer le conteneur, exécutez :

```
docker compose up -d
```

Ensuite, construisez la base de données avec :

```
# "symfony console" is equivalent to "bin/console"
# but it's aware of your database container
symfony console doctrine:database:create --if-not-exists
symfony console doctrine:schema:update --force
symfony console doctrine:fixtures:load
```

(Si vous obtenez une erreur concernant "Le serveur MySQL a disparu", 
attendez quelques secondes et réessayez - le conteneur est probablement encore en train de démarrer).

Si vous ne souhaitez pas utiliser Docker, assurez-vous simplement de démarrer votre propre serveur de base de données
et de mettre à jour la variable d'environnement  `DATABASE_URL` dans
`.env` ou `.env.local`avant d'exécuter les commandes ci-dessus.

**Démarrez le serveur Web Symfony**

You can use Nginx or Apache, but Symfony's local web server
works even better.

Vous pouvez utiliser Nginx ou Apache, mais le serveur Web local de Symfony fonctionne encore mieux.

Pour installer le serveur Web local Symfony, suivez les instructions
« Téléchargement du client Symfony » trouvées ici :: https://symfony.com/download 
- vous ne devez le faire qu'une seule fois sur votre système.

Ensuite, pour démarrer le serveur Web, ouvrez un terminal, accédez au projet et exécutez :

```
symfony serve
```

(Si c'est la première fois que vous utilisez cette commande, 
vous verrez peut-être une erreur que vous devrez `symfony server:ca:install` d'abord exécuter).

Consultez maintenant le site à `https://localhost:8000`



**FACULTATIF L: Webpack Encore Assets**

Cette application utilise Webpack Encore pour les fichiers CSS, 
JS et image. Mais les fichiers construits sont déjà inclus... 

vous n'avez donc pas besoin de télécharger ou de construire quoi que ce soit si vous ne le souhaitez pas !

Mais si vous souhaitez jouer avec le CSS/JS et créer les fichiers finaux, pas de problème. 
Assurez-vous d'avoir installé `npm`  (`npm` fourni avec Node), puis exécutez :

```
yarn install
yarn encore dev --watch

# or
npm install
npm run watch
```






