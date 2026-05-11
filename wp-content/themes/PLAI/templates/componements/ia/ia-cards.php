<?php
$url_field = get_field('url__ia');
$url = '';

if (is_array($url_field) && isset($url_field['url'])) {
    $url = $url_field['url'];
} elseif (is_string($url_field)) {
    $url = $url_field;
}

if (empty($url)) return;

$description = get_field('description__ia');
$image = get_field('images__ia');
?>

<a href="<?= esc_url($url); ?>" target="_blank" class="card-ressource">
    <?php if ($image && isset($image['url'])) : ?>
        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? ''); ?>">
    <?php endif; ?>

    <h3><?php the_title(); ?></h3>

    <?php if ($description) : ?>
        <p><?= esc_html($description); ?></p>
    <?php endif; ?>
</a>