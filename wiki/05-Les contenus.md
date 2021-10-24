# Les contenus

* 🔖 **Custom post type**
* 🔖 **Taxonomie**
* 🔖 **Metaboxes**
* 🔖 **Shortcodes**
* 🔖 **Champs personnalisés**

___

## 📑 Custom post type

> Par défaut il existe deux types de post, article et page.

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/post-type.jpg)

Il est possible de créer des types de post personnalisés. En utilisant les types de publication personnalisés, vous pouvez enregistrer votre propre type de publication. Une fois qu'un type de publication personnalisé est enregistré, il obtient un nouvel écran administratif de niveau supérieur qui peut être utilisé pour gérer et créer des publications de ce type.

### 🏷️ **Déclaration**

La fonction `register_post_type` permet d'ajouter un type.

```php
add_action('init', 'create_product_post_type');
function create_product_post_type()
{
    register_post_type(
        'product',
        [
            'labels' => [
                'name'          => 'Products',
                'singular_name' => 'Product',
            ],
            'public'      => true,
            'has_archive' => true,
        ]
    );
}
```

[Register post type](https://developer.wordpress.org/reference/functions/register_post_type/)

### 🏷️ **Affichage**

Il est possible d'utiliser hierarchie wordpress pour créer un fichier de tempalte personnalisé afin de ne pas utiliser celui des articles et des pages qui serait `archive.php`. Il suffit de créer un fichier qui possède le nom de type.

> Il est évidement possible de personnaliser l'extraction d'un type particulier.

[Working this custom post type](https://developer.wordpress.org/plugins/post-types/working-with-custom-post-types/)

Attention, à la mise en place vous devez exécuter la fonction suivante une fois. Inscrivez la en haut du fichier `functions.php` pour suprimez la.

```php
flush_rewrite_rules();
```
___

👨🏻‍💻 Manipulation

Créez un type personnalisé

___

## 📑 Taxonomie

Par défaut, WordPress inclut deux types de taxonomies ouvertes au public :

* Catégories
* Étiquettes

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/category.png)

### 🏷️ **Déclaration**

Il est possible de créer de novuelles taxonomies! Pour ce faire il faut ajouter du code php dans le fichier functions.php.

```php
add_action('init', 'create_color_taxonomies');

function create_color_taxonomies()
{
    register_taxonomy('color', ['product'], [
        'hierarchical'      => true,
        'labels'            => [
            'name'              => 'Colors',
            'singular_name'     => 'Color',
            'search_items'      => 'Search Colors',
            'all_items'         => 'All Colors',
            'parent_item'       => 'Parent Color',
            'parent_item_colon' => 'Parent Color',
            'edit_item'         => 'Edit Color',
            'update_item'       => 'Update Color',
            'add_new_item'      => 'Add New Color',
            'new_item_name'     => 'New Color Name',
            'menu_name'         => 'Color',
        ],
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'genre'],
    ]);
}
```

[Register taxonomy](https://developer.wordpress.org/reference/functions/register_taxonomy/)

Le second argument de `register_taxonomy` correspond à un tableau des types auxquels seront appliqués cette taxonomie.

![image](https://raw.githubusercontent.com/seeren-training/Wordpress-Perfectionnement/master/wiki/resources/taxonomy.png)

### 🏷️ **Affichage**

Il existe plusieurs fonctions pour afficher ou récupérer les valeurs d'une taxonomie personnalsiée.

La fonction get_the_term_list permet l'affichage avec un séparateur des taxonomies en fonction de l'identifiant d'un post. Il faut être dans le contexte de la boucle pour avoir à disposition l'identifiant du post.

```php
<?php the_terms(get_the_ID(), 'color', '', ', ') ?>
```

___

👨🏻‍💻 Manipulation

Créez une nouvelle taxonomie dans votre thème enfant pour le type personnalisé créé précédement

___

## 📑 Metaboxes

Les metabox (ou boîtes à meta information) sont des données enregistrées pour un contenu spécifique (page ou article donné) et qui permettent par exemple de facilement modifier l’affichage du contenu selon les informations saisies.

En fait, vous les utilisez à chaque fois sans que vous le sachiez vraiment. Les catégories, tags, format etc… sont autant de metaboxes.

### 🏷️ **Déclaration**

Il est possible de créer ses propres méta boxes grace à des plugins ainsi qu'en modifiant le fichier function.php.

La fonction `create_meta_box` déclare une nouvelle box.

```php
add_action('add_meta_boxes', 'create_meta_box');

function create_meta_box()
{
    add_meta_box(
        'some_wporg_box_id',
        'Custom Meta Box Title',
        'create_meta_box_html',
        'post'
    );
}
```

Il faut spécifier le contenu HTML de cette box.

```html
function create_meta_box_html($post)
{
    $value = get_post_meta($post->ID, 'some_wporg_box_id', true);
?>
    <label for="some_wporg_field">Description for this field</label>
    <select name="some_wporg_field" id="some_wporg_field" class="postbox">
        <option value="something-else" <?php selected($value, 'something-else') ?>>Select something...</option>
        <option value="something"<?php selected($value, 'something') ?>>Something</option>
        <option value="else"<?php selected($value, 'else') ?>>Else</option>
    </select>
<?php
}
```

Il faut enregistrer la valeur de la box si le type est mis à jour.

```php
add_action('save_post', 'create_meta_box_save');

function create_meta_box_save($post_id)
{
    if (array_key_exists('some_wporg_field', $_POST)) {
        update_post_meta(
            $post_id,
            'some_wporg_box_id',
            $_POST['some_wporg_field']
        );
    }
}
```

C'est un peu technique mais comme nous pouvons l'observer ce sont les fonctions PHP de wordpress qui permettent sa customisation.

### 🏷️ **Affichage**

Nous pouvons récupérer facilement le contenu d'une box dans un template, dans le contexte de la boucle comme observé pour la taxonomie. La fonction get_post_meta permet de récupérer la valeur d'une box.

```php
<h1>
<?php echo get_post_meta(get_the_ID(), 'some_wporg_box_id', true) ?>
</h1>
```

___

👨🏻‍💻 Manipulation

Créez une nouvelle meta box dans votre thème enfant pour le type personnalisé créé précédement

___

## 📑 Shortcodes

Les codes courts WordPress sont des chaînes de crochets ([ ]) qui se transforment comme par magie en quelque chose de plus complexe sur l’interface publique. Ils permettent aux utilisateurs de créer et de modifier facilement des contenus complexes sans avoir à se soucier de la complexité du HTML ou des codes d’intégration.

### 🏷️ **Les codes existants**

Il existe quelques shortcode par défaut:

* audio
* caption
* embed
* gallery
* playlist
* video

[Shortcode](https://codex.wordpress.org/Shortcode)

Par exemple si vous relevez l'id de quelques images vous pouvez facilement obtenir une gallerie d'image.

```html
[gallery ids="1, 2, 3"]
```

Ils disparaissent peut à peut grace à l'éditeur de bloc qui permet de mieux maitriser l'apparance visuelle du contenu.

Vous pouvez également les utiliser dans vos templates.

```php
echo do_shortcode('[gallery ids="1, 2, 3"]');
```

Il est possible de créer ses propres short code avec la fonction `add_shortcode`.

[Add Shortcode](https://developer.wordpress.org/reference/functions/add_shortcode/)

___

## 📑 Champs personnalisés

> Les champs personnalisés permettent d’ajouter des informations dans une publication en plus du contenu principal. L’interface des custom fields est cependant très limitée.

Le fonctionnement est semblable aux meta boxes, il faut demander l'activation dans les options de la page puis ovus pouvez créer des champs selon le couple clef valeur.

Pour récupérer leur contenu dans le template il faudra utiliser la fonction `get_post_meta`.

> Pour ces différentes fonctionnalités vous disposer de nombreux plugins effectuant le travail d'ajouter des posts, taxonomy, shortcode, meta box ou champs personnalisés.

[Advanced Custom Fields](https://www.advancedcustomfields.com/)

[Custom Post Type Ii](https://fr.wordpress.org/plugins/custom-post-type-ui/)

Cependant l'ajout des types et taxonomy via functions.php permet d'avoir un projet qui dans sa structure propose un cadrage du contenu sans être dépendant d'outils externes.