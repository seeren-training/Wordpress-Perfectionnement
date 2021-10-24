# Extensions et widget

* 🔖 **Les hooks**
* 🔖 **Action**
* 🔖 **Filtre**
* 🔖 **Widgets**

___

## 📑 Les hooks

Les Hooks sont des fonctions déclarées par le développeur de thème ou d’extension qui permettent d’interagir avec le coeur de WordPress, d’autres thèmes ou extensions et lancés à des moments clés de leur exécution. 

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/hook.png)

Par exemple, on peut intercepter le moment où WordPress enregistre un article dans la base, afin d’y apporter des modifications. Il existe 2 types de Hooks : les `actions`, un moment clé pour lancer ses propres fonctions, et les `filtres`, pour intercepter une valeur à un moment donné et la modifier.

### 🏷️ **Action et filtre**

La principale différence entre une action et un filtre peut se résumer ainsi :

* Une action prend les informations qu'elle reçoit, en fait quelque chose et ne renvoie rien. En d'autres termes : il agit sur quelque chose puis sort, ne renvoyant rien au crochet appelant.
* Un filtre prend les informations qu'il reçoit, les modifie d'une manière ou d'une autre et les renvoie. En d'autres termes : il filtre quelque chose et le renvoie au crochet pour une utilisation ultérieure.

Dit autrement :

* Une action interrompt le flux de code pour faire quelque chose, puis revient au flux normal sans rien modifier ;
* Un filtre est utilisé pour modifier quelque chose d'une manière spécifique afin que la modification soit ensuite utilisée par le code plus tard.

[Hooks](https://developer.wordpress.org/plugins/hooks/)

___

👨🏻‍💻 Manipulation

Observons les différentes actions proposées

___

## 📑 Action

Les actions sont l'un des deux types de Hooks. Ils fournissent un moyen d'exécuter une fonction à un moment spécifique de l'exécution de WordPress Core, des plugins et des thèmes. Les fonctions de rappel d'une action ne renvoient rien au hook d'action appelant. Ils sont la contrepartie des filtres. Voici un rappel de la différence entre les actions et les filtres.

[List des actions](https://codex.wordpress.org/Plugin_API/Action_Reference)

Nous avons déjà enregistré des actions pour par exemple ajouter un type de post personnalisé. Nous avons utilisé la fonction `add_action`.

### 🏷️ **Arguments**

La fonction `add_action` prend en premier argument le nom d'un hook d'action et en second argument le nom d'une fonction de rappel.

```php
add_action(
    'init', 
    'create_product_post_type'
);
```
___

## 📑 Filtre

Les filtres sont l'un des deux types de Hooks. Ils permettent aux fonctions de modifier les données lors de l'exécution de WordPress Core, des plugins et des thèmes. Ils sont la contrepartie des Actions. Contrairement aux actions, les filtres sont destinés à fonctionner de manière isolée et ne devraient jamais avoir d'effets secondaires tels qu'affecter les variables globales et la sortie. Les filtres s'attendent à ce que quelque chose leur soit renvoyé.

[Les des filtres](https://codex.wordpress.org/Plugin_API/Filter_Reference)

Vous utiliserez la fonction `add_filter` en passant au moins deux paramètres :

### 🏷️ **Arguments**

La fonction add_action prend en premier argument le nom d'un hook d'action et en second argument le nom d'une fonction de rappel.

> Par exemple pour modifier l'ensemble des titres des posts.

```php
function filter_title_custom( $title ) {
    return 'The ' . $title . ' was filtered';
}
add_filter( 'the_title', 'filter_title_custom' );
```

L'avantage est de pouvoir centraliser et automatiser l'ensemble des vues sans avoir à les modifier unitairement.

___

👨🏻‍💻 Manipulation

Observons les différents filtres proposées

___

## 📑 Widgets

Les widgets WordPress ajoutent du contenu et des fonctionnalités à vos barres latérales. Les exemples sont les widgets par défaut fournis avec WordPress ; pour les catégories, le nuage de tags, la recherche, etc. Les plugins ajoutent souvent leurs propres widgets.

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/widget.jpg)

Les widgets ont été conçus à l'origine pour fournir un moyen simple et facile à utiliser de donner à l'utilisateur le contrôle de la conception et de la structure du thème WordPress, qui est désormais disponible sur les thèmes WordPress correctement « widgetisés » pour inclure l'en-tête, le pied de page et ailleurs dans la conception et la structure de WordPress.


### 🏷️ **Afficher**

Vous pouvez demander l'affichage unitaire de chaque widget avec la fonction `the_widget`.

```php
<?php the_widget('WP_Widget_Categories') ?>
```

[The Widget](https://developer.wordpress.org/reference/functions/the_widget/)

Les widgets par defaut sont:

* WP_Widget_Archives — Archives
* WP_Widget_Calendar — Calendar
* WP_Widget_Categories — Categories
* WP_Widget_Links — Links
* WP_Widget_Meta — Meta
* WP_Widget_Pages — Pages
* WP_Widget_Recent_Comments — Recent Comments
* WP_Widget_Recent_Posts — Recent Posts
* WP_Widget_RSS — RSS
* WP_Widget_Search — Search (a search from)
* WP_Widget_Tag_Cloud — Tag Cloud
* WP_Widget_Text — Text
* WP_Nav_Menu_Widget

___

👨🏻‍💻 Manipulation

Afficher les widgets de vos choix dans des endroits ciblés

___