# Thème enfant

* 🔖 **Principe**
* 🔖 **Les fichiers**

___

## 📑 Principe

> Un thème WordPress enfant, c’est un thème qui va hériter des fonctionnalités, du design et de la mise en page d’un thème installé sur un site (qui devient le thème parent) et permettre de le personnaliser en profondeur.

![image](./resources/child-theme.jpg)

Il existe quelques raisons qui pourraient vous donner envie d'utiliser un thème enfant :
* Si vous modifiez un thème existant et qu'il est mis à jour, vos modifications seront perdues.
* Utiliser un thème enfant vous assure que vos modifications seront préservées.
*  Utiliser un thème enfant accélère le temps de développement.  
* Utiliser un thème enfant est une excellente façon de commencer pour apprendre comment développer un thème WordPress.

___

## 📑 Les fichiers

Un thème enfant est composé d'au moins un répertoire (le répertoire du thème enfant) et deux fichiers obligatoires. 

### 🏷️ **Le répertoire**

Par convention il faut créer un repertoire qui possède comme préfix le nom du thème parent puis le `-` comem séparateur suivit de child. Exemple twentyfifteen-child.

### 🏷️ **Le CSS**

Le fichier `style.css` est une obligation. Il doit posséder l'entête suivante:

```css
/*
 Theme Name:   Twenty Fifteen Child
 Theme URI:    http://example.com/twenty-fifteen-child/
 Description:  Twenty Fifteen Child Theme
 Author:       John Doe
 Author URI:   http://example.com
 Template:     twentyfifteen
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready
 Text Domain:  twenty-fifteen-child
*/
```

[Theme Stylesheet](https://codex.wordpress.org/Theme_Development#Theme_Stylesheet)

La ligne Template correspond au nom du répertoire du thème parent. Le thème parent dans notre exemple est le thème Twenty Fifteen, de sorte que le Template soit twentyfifteen. Vous pouvez travailler avec un thème différent, donc adapter en conséquence.

### 🏷️ **Le PHP**

Le seul fichier requis pour un thème enfant est style.css, mais functions.php est nécessaire pour mettre en file d'attente correctement les styles (voir ci-dessous).

La première ligne de functions.php de votre thème enfant sera une balise d'ouverture de PHP ( <?php ), après quoi vous pourrez mettre en file d'attente les feuilles de style du parent et du thème enfant.

Pour ajouter un style du parent:

```php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_parent_styles' );
function theme_enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/some-file.css' );

}
```

Pour ajouter un style de l'enfant:

```php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/some-file.css' );

}
```

### 🏷️ **Surcharge**

Si vous voulez changer plus que le style, le thème de votre enfant peut écraser n'importe quel fichier dans le thème parent : il suffit simplement d'inclure un fichier du même nom dans le répertoire du thème enfant, et il va écraser le fichier équivalent dans le répertoire du thème parent au chargement du site. Par exemple, si vous souhaitez modifier le code PHP pour modifier l'en-tête du site, vous pouvez inclure un header.php dans le répertoire du thème de votre enfant, et ce fichier sera utilisé à la place du fichier header.php du thème parent.

Vous pouvez également inclure des fichiers dans le thème enfant qui ne sont pas présents dans le thème parent. Par exemple, vous pouvez créer un modèle plus spécifique que ceux que l'on trouve dans le thème de votre parent, comme un modèle pour une page spécifique ou une catégorie archive. Voir la hiérarchie de modèle pour plus d'informations sur la façon dont WordPress décide du modèle à utiliser. 

> Contrairement au fichier style.css, le fichier functions.php du thème enfant n'écrase pas son homologue du parent. Au lieu de cela, il est chargé en plus du fichier functions.php du parent.

___

👨🏻‍💻 Manipulation

Créez un thème enfant à partir du theme twenty twenty one

___