# TP_Hyrule

# v4

# configuration du serveur :

## 1- installation d'une vm linux
## 2- execution des commandes :
  - sudo apt update
  - sudo apt install apache2 
  - sudo systemctl start apache2
  - sudo apt install mysql-server php-mysql -y    // uniquement si l'on souhaite utiliser une bdd plus tard

### 2.1- commandes optionnelles pour le developpement
  - sudo apt-get install git 
  - sudo apt install gh 
  - sudo auth login  //pour connecter sa machine a github
  - cd chemin/projet
  - git clone https://github.com/sebastienIOVLEFF/TP_Hyrule.git   //besoins des accès
  - git checkout <branche-finale>

## 3- déploiement du projet sur le serveur web
  - sudo mv /var/www/html/TP_Hyrule /TP_Hyrule/var/www/TP_Hyrule
  - sudo chown -R www-data:www-data /var/www//TP_Hyrule
  - sudo chmod -R 755 /var/www/TP_Hyrule

## 3.1- création d'un virtual host 

  - sudo nano /etc/apache2/sites-available/TP_Hyrule.conf

    //ajouter le contenu suivant dans le fichier :

    <VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/TP_Hyrule

    <Directory /var/www/TP_Hyrule>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/TP_Hyrule_error.log
    CustomLog ${APACHE_LOG_DIR}/TP_Hyrule_access.log combined
</VirtualHost>

  -sudo a2dissite 000-default.conf // pour désactiver la page par défaut de apache
  -systemctl reload apache2
  -sudo a2enmod rewrite
  -sudo systemctl restart apache2

##  3.2 - accès au site 

-ip a pour obetnir l'ip du serveur // 

nous pouvons maintenant acceder au site via  http://192.168.x.x/

### 3.3- commandes pour le dépoilement d'une nouvelle version
  - sudo rm -rf /var/www/TP_Hyrule
  - sudo cp -r /home/kali/Documents/tp_hyrule/TP_Hyrule /var/www/   //remplacer par son path
  - sudo chown -R www-data:www-data /var/www/TP_Hyrule
  - sudo chmod -R 755 /var/www/TP_Hyrule










 


