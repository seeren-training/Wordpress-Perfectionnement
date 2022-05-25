<?php

add_action('add_meta_boxes', 'create_photo_size_meta_box');

function create_photo_size_meta_box()
{
    add_meta_box(
        'photo_size',
        'Photo size',
        'create_photo_size_meta_box_html',
        'photo'
    );
}

function create_photo_size_meta_box_html($post)
{
    $size = json_decode(get_post_meta($post->ID, 'photo_size', true), true);
?>
    <label for="photo_size_height_field">Hauteur (cm)</label>
    <input type="text" name="photo_size_height_field" id="photo_size_height_field" value="<?= (float) ($size['height'] ?? '') ?>">
    <label for="photo_size_width_field">Largeur (cm)</label>
    <input type="text" name="photo_size_width_field" id="photo_size_width_field" value="<?= (float) ($size['width'] ?? '') ?>">
<?php

}


add_action('save_post', 'save_photo_size_meta_box');

function save_photo_size_meta_box($post_id)
{
    $height = filter_input(INPUT_POST, 'photo_size_height_field');
    $width = filter_input(INPUT_POST, 'photo_size_width_field');
    if ($height && $width) {
        $size = [
            'height' => abs((float) $height),
            'width' => abs((float) $width),
        ];
        update_post_meta(
            $post_id,
            'photo_size',
            json_encode($size)
        );
    }
}
