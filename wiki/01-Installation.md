# Installation

* 🔖 **Prérequis**
* 🔖 **Composer**

___

## 📑 Prérequis

`Wordpress` est un `CMS` utilisant le langage `PHP`. De ce fait les prérequis correspondent à l'environnement de ce langage.

![image](./resources/prerequist.jpg)

### 🏷️ **PHP**

Pour installer PHP vous avez plusieurs solutions:

* Xampp, Wampp, Mampp et autres distributions
* PHP official distribution
* PHP avec le package manager de votre OS

[PHP](https://www.php.net/)

### 🏷️ **MySQL**

Pour installer MySQL vous avez plusieurs solutions:

* Xampp, Wampp, Mampp et autres distributions
* MySQL official distribution
* MySQL avec le package manager de votre OS

[MySQL](https://www.mysql.com/fr/)

### 🏷️ **Composer**

Composer est le package manager de PHP. Il sert à initialiser, installer les librairies d'un projet et bien d'autre.

[Composer](https://getcomposer.org/)

### 🏷️ **NPM**

Npm est le package manager de HTML/CSS/JavaScript. Il sert à initialiser, installer les librairies d'un projet et bien d'autre. Il est compris à l'installation de node.js

[Composer](https://getcomposer.org/)

### 🏷️ **IDE**

Il faudra également pouvoir naviguer dans l'arborescence du projet et éditer du code. L'IDE adapté à PHP est PHPStorm de part son onglet de gestion de base de données intégré, il est également possible d'utiliser VSCode avec des plugins ou autre IDE préférentiel.

[Npm](https://www.npmjs.com/)

___

👨🏻‍💻 Manipulation

Installez les prérequis des l'environnements HTML/CSS/Javascriot/PHP

___

## 📑 Composer

`Composer` peut être utile pour initialiser un projet wordpress via un terminal.

![image](./resources/composer.png)

Pour vérifier que composer est bien installé, vérifiez sa présence via la commande suivante.

```bash
composer
```

Pour créer un projet il suffit de demander la création via le dépot officiel de wordpress.

[Wordpress](https://packagist.org/packages/johnpbloch/wordpress)

```bash
composer create-project johnpbloch/wordpress name-to-customize
```

___

👨🏻‍💻 Manipulation

Installez un projet wordpress à l'emplacement de votre choix

___

Vous pouvez alors simplement exécuter votre projet depuis votre terminal.

```bash
php -S localhost:8000 -t name-to-customize/wordpress
```

Vous pouvez également déplacer le dossier généré dans le dossier `www` ou `htdocs` de votre server web local et le démarrer.

___

👨🏻‍💻 Manipulation

Lanciez votre projet dans le navigateur en exécutant votre serveur web ou en utilisant PHP.

___

Nous remarquons qu'avec `PHP` et le package manager `Composer` il est possible de lancer un projet wordpress en deux instructions. Autour de cet écossytème il existe de nombreux outils permettant de gérer les thèmes et plugins du projet en utilisant composer.