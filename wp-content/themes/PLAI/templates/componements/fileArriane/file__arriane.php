<?php
$object_id = get_queried_object_id();
$title = get_the_title($object_id);

// Override manuel selon page / CPT / slug
if (is_post_type_archive('documents') || is_singular('documents')) {
    $title = 'documents';
}

if (is_post_type_archive('ia') || is_singular('ia')) {
    $title = 'outi-IA';
}

if (is_post_type_archive('formations') || is_singular('formations')) {
    $title = 'Formations';
}
?>

<?php if (!is_front_page()) : ?>
    <nav class="breadcrumb" aria-label="Fil d'Ariane">
        <a href="<?= esc_url(home_url()); ?>" class="breadcrumb__link">Accueil</a>
        <span class="breadcrumb__separator">&rsaquo;</span>
        <span class="breadcrumb__page"><?= esc_html($title); ?></span>
    </nav>
<?php endif; ?>



