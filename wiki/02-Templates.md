# Templates

* 🔖 **HTML, CSS et hiérarchie**
* 🔖 **Header**
* 🔖 **Sidebar**
* 🔖 **Footer**

___

## 📑 HTML, CSS et hiérarchie

Lorsque vous choisissez un thème, vous décider d'utiliser des fichiers qui sont situés dans **wp-content/themes/**.

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/theme.png)

Chaque thème possède un dossier qui porte son nom, décrivons son contenu.

### 🏷️ **HTML**

Les fichiers html possèdent l'extension `.php` qui permettent leur dynamisme. Le PHP est un langage permettant d'interpréter des instructions qui sont à l'intérieur du tag php.

```php
<h1>
    <?php echo 'Some PHP' ?>
</h1>
```

 Il faut considérer que PHP calcul le contenu de vos balises grace à son vocabulaire et vous avez la possibilité d'éditer l'HTML des templates. Concernant le PHP, soyez sur de ce que vous faites!

### 🏷️ **CSS**

Chaque template possède obligatoirement le fichier `style.css`.

Ce fichier permet de déclarer le thème grace aux commentaires en haut de fichier, puis il contient l'ensemble du CSS du template.

```css
/*   
Theme Name: Rose
Theme URI: Homepage du thème
Description: Une courte description
Author: votre nom
Author URI: votre URL
Template: Utiliser cette ligne si vous utilisez un thème parent
Version: numéro de version optionnel
.
Commentaires généraux / Information de licences si applicable.
.
*/
```

[CSS File Header](https://codex.wordpress.org/File_Header)

### SCSS

Il est possible que le thème possède des fichiers `.scss`. Le scss est un langage de type préprocesseur permettant de dynamiser le CSS. Vous ne pouvez pas les relier à votre thème et ils sont utilisés pour générer le fichier `.css` tout en permettant de travailler dans de multiples fichiers à la syntaxe plus puissante. Pour effectuer cette opération il faut les outils adéquates comme `webpack`, `node-sass`, `compass` ou un plugin de votre `ide`.

### 🏷️ **Hiérarchie**

WordPress utilise l'URL pointant sur votre site pour décider quel modèle, ou ensemble de modèles, utiliser pour l'affichage de la page en question.

En premier lieu, WordPress compare chaque URL aux différents types de requête — afin de repérer quel type de page (une page de recherche, une page de catégorie, la page d'accueil, etc.) doit être affiché.

> Les fichiers modèles sont alors sélectionnés — et le contenu de la page est généré — selon la hiérarchie des modèles de WordPress présentée ici, en fonction de leur présence ou non dans le thème WordPress utilisé. 

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/Template_Hierarchy.png)

À l'exception du fichier modèle de base `index.php` qui doit être présent dans tout thème, les développeurs de thème sont libres de choisir s'ils veulent ou non implémenter ou non tel ou tel fichier modèle. Si WordPress ne trouve pas le premier fichier attendu pour le type de page dans la liste, il passe au fichier suivant de la hiérarchie. En dernier lieu, si aucun fichier n'a été trouvé, c'est le fichier index.php qui sera utilisé. 

[Template hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)

___

👨🏻‍💻 Manipulation

Créez des fichiers distincts pour les pages, articles, auteurs et accueil.

___

## 📑 Header

Si votre thème le permet, vous pouvez personnaliser l'en-tête de votre site en mettant une image en ligne, et en la configurant.

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/header.png)

### 🏷️ **Déclaration**

L'entête se personnalise en modifiant le fichier `header.php` et les fichiers reliés.

[Add theme header](https://codex.wordpress.org/Custom_Headers)

```html
<header id="masthead" class="site-header" role="banner">

    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>

    <?php if ( has_nav_menu( 'top' ) ) : ?>
        <div class="navigation-top">
            <div class="wrap">
                <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            </div><!-- .wrap -->
        </div><!-- .navigation-top -->
    <?php endif; ?>

</header><!-- #masthead -->
```

L'on se rend compte qu'il y a des expressions qui utilisent des fichiers externes. La fonction `get_template_part` permet d'inclure des fichiers se trouvant dans le thème. Il faudra les modifier pour personnaliser des parties précises de votre thème.

### 🏷️ **Affichage**

Il est possible que les différentes parties soient incluses en utilisant d'autres fonctions disponibles et qu’il soit difficile d'identifier le fichier contenant l'HTML du header.

La fonction `get_header` est responsable de charger le fichier `header.php`

```php
<?php get_header(); ?>
```

Cette fonction prend un argument optionnel qui chargera une déclinaison du header.

```php
<?php get_header( 'primary' ); ?>
```

Utilisera le fichier header-primary.php.

___

👨🏻‍💻 Manipulation

Ajoutez une classe sur la balise contenant le logo.

___

## 📑 Sidebar

La sidebar est la zone permettant l'affichage des widgets. 


![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/sidebar.png)

Un thème peut posséder plusieurs sidebar. Pour ajouter une sidebar il faut l'enregistrer en PHP afin de pouvoir demander son affichage avec une fonction spécifique.

### 🏷️ **Déclaration**

Les sidebar sont enregistrées en utilisant la fonction `register_sidebar` généralement dans le fichier `functions.php`. Il permet de spécifier le conteneurs HTML, le titre et la description de la sidebar.

```php
register_sidebar(
    array(
        'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )
);
```

[Enregistrer une sidebar](https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar)

### 🏷️ **Affichage**

Chaque sidebar peut s'afficher à des endroit différents en demandant l'appel de la fonction `dynamic_sidebar`.

```html
<aside class="widget-area">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
```

Une autre solution est de demander à wordpress une sidebar spécifique avec la fonction `get_sidebar`. Wordpress chargera alors le fichier sidebar.php. Vous pouvez avoir plusieurs sidebar avec un identifiant spécifique, et il est alors possible de dynamiser le nom du fichier sidebar.

```php
<?php get_sidebar( 'primary' ); ?>
```

Utilisera le fichier sidebar-primary.php.

___

👨🏻‍💻 Manipulation

Créez une nouvelle sidebar, déclarer un fichier permettant son affichage et récupérez cette sidebar dans le footer.

___

## 📑 Footer

> La logique du footer est la même que celle du header.

La fonction `get_footer` charge le fichier `footer.php`.

```php
<?php get_footer(); ?>
```

Cette fonction prend un argument optionnel qui chargera une déclinaison du footer.

```php
<?php get_footer( 'primary' ); ?>
```

Utilisera le fichier footer-primary.php.

___

👨🏻‍💻 Manipulation

Créez un fichier footer-404.php qui doit s'afficher sur la page 404.

___
