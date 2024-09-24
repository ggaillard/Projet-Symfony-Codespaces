# .devcontainer/Dockerfile

# Utiliser une image de base pour le conteneur de développement
FROM mcr.microsoft.com/vscode/devcontainers/base:ubuntu

# Définir les variables d'environnement
ENV MYSQL_ROOT_PASSWORD=rootpassword
ENV MYSQL_DATABASE=fortunecookie

# Installer PHP, Composer et les extensions nécessaires
RUN apt-get update && \
    apt-get install -y php php-cli php-mysql php-xml php-mbstring unzip curl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Installer MySQL
RUN apt-get update && \
    apt-get install -y mysql-server && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Configurer MySQL
RUN service mysql start && \
    mysql -e "CREATE DATABASE fortuneCookie;" && \
    mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';" && \
    service mysql stop
    
# Installer Adminer
RUN apt-get update && \
    apt-get install -y adminer && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copier les fichiers de votre projet Symfony dans le conteneur
COPY . /var/www/symfony

# Définir le répertoire de travail
WORKDIR /var/www/symfony

# Exposer les ports nécessaires
EXPOSE 3306 8080

# Démarrer les services
CMD service mysql start && \
    php -S 0.0.0.0:8080 -t public