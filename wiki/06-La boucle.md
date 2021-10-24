# La boucle

* 🔖 **Template tags**
* 🔖 **Marqueurs conditionnels**
* 🔖 **Boucle principale**
* 🔖 **Boucle personnalisée**

___

## 📑 Template tags

A l'intérieur d'un fichier qui afficha un post, article ou autre type de données vous pouvez utiliser des onfctions pour récupérer ses différentes inforamtions. Ce sont les template tags.

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/wordpress-loop.jpg)

[Template tags](https://codex.wordpress.org/Template_Tags)

> L'identification des fonctions par catégorie permet de reprendre la main sur le contenu affiché par le thème.

Ces fonctions doivent être étudiées pour les éxécuter en respectant leur signature, à savoir la liste des arguments attendus et en analysant la veleur deretour ou le comportement de la fonction.

Par exemple `the_title` affiche le titre et ne s'utilise pas avec echo.

```php
<?php the_title() >
```

___

👨🏻‍💻 Manipulation

Observons les différentes fonctions proposées

___


## 📑 Marqueurs conditionnels

Les Marqueurs Conditionnels peuvent être utilisés dans vos Thèmes pour décider du contenu à afficher sur une page spécifique ou comment ce contenu doit être affiché en fonction de conditions que remplit cette page. Par exemple, si vous voulez insérer un texte particulier au-dessus d'une série d'Articles, mais seulement sur la page principale de votre blog, avec le Marqueur Conditionnel `is_home`(), cela devient facile.


[Conditionnal tags](https://codex.wordpress.org/fr:Marqueurs_conditionnels)

Ils sont à utiliser avec la structure conditionelle du langage php.

```php
<?php 
if (is_home()) {

echo "<h1>Vous êtes sur la page d'accueil.</h1>";

}
?>
```

Observons les variantes, le tag php peut entourer uniquement le code php.

```html
<?php if (is_home()) { ?>

<h1>Vous êtes sur la page d'accueil.</h1>

<?php } ?>
```

La condition peut utiliser une syntaxe plus lisible

```html
<?php if (is_home()): ?>

<h1>Vous êtes sur la page d'accueil.</h1>

<?php endif ?>
```

___

## 📑 Boucle principale

Par défaut, wordpress extrait tous les posts en rapport avec l'url en cours pour afficher ses informations. C'est la boucle `while` qui est utilisée avec la fonction `have_post`.

```php
while ( have_posts() ) :
	the_post();

 // Content inside the loop.

endwhile;
```

A l'intérieur de la obucle vous pouvez obtenir toutes les inforamtions sur le post via les fonctions observés précédements comme `the_content`.

___

## 📑 Boucle personnalisée

> Il est possible que vous souhaitiez procéder à une extraction personnalisée du contenu.

### 🏷️ **Déclaration**

Certains objects wordpress comme `WP_Query` permettent de formuler des requêtes personnalisées. Il suffit de se documenter pou renseigner les paramètres souhaités.

[Wp Query](https://developer.wordpress.org/reference/classes/wp_query/#parameters)

```php
$query = new WP_Query([
    'post_type' => 'product',
]);
```

### 🏷️ **Affichage**

Pour exploiter cetter requête personnalisée il suffit de légèrement modifier la boucle par défaut.

```php
while ($query->have_posts() ) :
	$query->the_post();

    // Content inside the loop.
endwhile;
```

L'ensemble des templates tags fonctionnerons en utilisant la méthode `the_post` de la requête personnalisée.

___

👨🏻‍💻 Manipulation

Créez une page qui affiche l'ensemble des posts de votre custom post type créé au chapitre précédent.

___