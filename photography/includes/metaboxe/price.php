<?php

add_action('add_meta_boxes', 'create_photo_price_meta_box');

function create_photo_price_meta_box()
{
    add_meta_box(
        'photo_price',
        'Photo Price',
        'create_photo_price_meta_box_html',
        'photo'
    );
}

function create_photo_price_meta_box_html($post)
{
    $price = get_post_meta($post->ID, 'photo_price', true);

?>
        <label for="photo_price_field">Price (€)</label>
        <input type="text" name="photo_price_field" id="photo_price_field" value="<?= (float) $price ?>">
<?php

}


add_action('save_post', 'save_photo_price_meta_box');

function save_photo_price_meta_box($post_id)
{
    if (array_key_exists('photo_price_field', $_POST)) {
        update_post_meta(
            $post_id,
            'photo_price',
            (float) $_POST['photo_price_field']
        );
    }
}