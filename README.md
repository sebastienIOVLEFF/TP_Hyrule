# TP_Hyrule

# v4

# configuration du serveur :

## 1- installation d'une vm linux
## 2- execution des commandes :
  - sudo apt update
  - sudo apt install apache2 php libapache2-mod-php php-cli php-mbstring php-xml php-curl php-zip -y
  - sudo apt install mysql-server php-mysql -y    // uniquement si l'on souhaite utiliser une bdd plus tard

### 2.1- commandes optionnelles pour le developpement
  - sudo apt install git 
  - cd chemin/projet
  - git clone https://github.com/sebastienIOVLEFF/TP_Hyrule.git   //besoins des accès
  - git checkout <branche-finale>

## 3- déploiement du projet sur le serveur web
  - sudo cp -r ~/chemin/projet /var/www/html/
  - sudo chown -R www-data:www-data /var/www/html/TP_Hyrule
  - sudo chmod -R 755 /var/www/html/TP_Hyrule

nous pouvons maintenant acceder au site via  http://localhost/TP_Hyrule/





 


