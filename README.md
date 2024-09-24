
# Tutorials, Fortune Cookies & Doctrine Queries

## Getting Started (Local)

### Étapes pour configurer ce projet Symfony en local :

1. Clonez ce dépôt sur votre machine locale :

    ```bash
    git clone https://github.com/your-username/symfony-SP.git
    ```

## Configuration

### Installation de l'outil CLI Symfony

Pour installer l'outil CLI Symfony, suivez les étapes suivantes :

1. **Installer Scoop** (Gestionnaire de paquets pour Windows)  
   Ouvrez un terminal PowerShell (version 5.1 ou supérieure) et exécutez la commande suivante :

    ```bash
    Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
    Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
    ```

2. **Installer Symfony CLI** :

    ```bash
    scoop install symfony-cli
    ```

3. **Vérifiez l'installation** en exécutant la commande suivante :

    ```bash
    symfony -v
    ```

    Cela affichera la version de Symfony CLI confirmant ainsi la réussite de l'installation.

4. **Vérifiez les prérequis Symfony** en exécutant :

    ```bash
    symfony check:req
    ```

    Ce script vérifie si votre environnement remplit les conditions nécessaires pour exécuter une application Symfony.

### Téléchargement des dépendances Composer

Assurez-vous d'avoir [installé Composer](https://getcomposer.org/download/), puis exécutez la commande suivante dans votre projet :

```bash
composer install
```

### Configuration de la base de données

Si MySQL n'est pas encore installé, vous devez l'installer pour que votre application Symfony puisse se connecter à une base de données MySQL.

1. **Télécharger MySQL** :  
   Rendez-vous sur le site officiel [MySQL Community Downloads](https://dev.mysql.com/downloads/installer/) et suivez les instructions.

2. **Extension MySQL pour Visual Studio Code** :  
   Utilisez l'extension "Database" pour Visual Studio Code afin d'interagir avec votre base de données. Vous pouvez l'installer via le gestionnaire d'extensions de VS Code.

3. **Créer la base de données** :  
   Une fois MySQL installé et configuré, exécutez les commandes suivantes pour créer et préparer la base de données :

    ```bash
    symfony console doctrine:database:create --if-not-exists
    symfony console doctrine:schema:update --force
    symfony console doctrine:fixtures:load
    ```

    *Si vous recevez l'erreur "Le serveur MySQL a disparu", attendez quelques secondes et réessayez. Le conteneur MySQL pourrait encore être en cours de démarrage.*

4. **Configuration sans Docker** :  
   Si vous ne souhaitez pas utiliser Docker, démarrez simplement votre propre serveur MySQL et mettez à jour la variable `DATABASE_URL` dans votre fichier `.env` ou `.env.local` avant d'exécuter les commandes ci-dessus.

### Démarrer le serveur Web Symfony

Pour démarrer le serveur Web Symfony, ouvrez un terminal, accédez au projet et exécutez la commande suivante :

```bash
symfony serve
```

*Si vous rencontrez une erreur indiquant que vous devez installer un certificat CA, exécutez la commande suivante :*

```bash
symfony server:ca:install
```

Accédez ensuite à votre site web via l'URL suivante : [https://localhost:8000](https://localhost:8000).

### Gestion des assets avec Webpack Encore

1. **Installer Node.js et npm** :  
   Si vous n'avez pas encore installé Node.js et npm, vous pouvez les télécharger depuis [Node.js Downloads](https://nodejs.org/en/download/).

2. **Installer les dépendances Webpack Encore** :  
   Dans le répertoire de votre projet, exécutez les commandes suivantes pour installer les dépendances et compiler les assets :

    ```bash
    yarn install
    yarn encore dev --watch
    ```

    Ou, si vous préférez utiliser npm :

    ```bash
    npm install
    npm run watch
    ```





