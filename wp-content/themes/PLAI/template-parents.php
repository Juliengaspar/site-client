<?php /* Template Name: Parents */?>
<?php

$parents_page = get_pages([
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-parents.php'
]);

$page_id = $parents_page[0]->ID;

$accesibilteTitle = get_field('accesibilte__title', $page_id);


$falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : '';

$accesibilteTitle = $falc ? get_field('accesibilte__title__falc' , $page_id) : get_field('accesibilte__title' , $page_id);
$accesibilteText = $falc ? get_field('accesibilte__description__falc' , $page_id) : get_field('accesibilte__description' , $page_id);
$accompagneTitle = $falc ? get_field('accompagne__title__falc' , $page_id) : get_field('accompagne__title' , $page_id);
$accompagneText = $falc ? get_field('accompagne__description__falc' , $page_id) : get_field('accompagne__description' , $page_id);
$parlerTitle = $falc ? get_field('parler__title__falc' , $page_id) : get_field('parler__title' , $page_id);
$parlerText = $falc ? get_field('parler__description__falc' , $page_id) : get_field('parler__description' , $page_id);

add_filter('body_class', function($classes) {
    if (isset($_GET['falc']) && $_GET['falc'] === 'true') {
        $classes[] = 'mode-falc';
    } else {
        $classes[] = 'mode-classique';
    }
    return $classes;
});

?>
<?php $falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : ''; ?>

<a href="/<?= $falc ? '' : '?falc=true'; ?>" title=""><?= $falc ? 'Classique' : 'Mode falc'; ?></a>

<section class="parents">
    <h2 class="parents__title"><?= get_field('title__page', $page_id); ?></h2>
    <section class="parents__ecole">
<!--        <h3 class="parents__ecole__title">--><?php //= $accesibilteTitle ?><!--</h3>-->
        <h3 class="parents__title"><?= $accesibilteTitle ?></h3>

        <div class="parents__ecole__explication">
<!--            --><?php //= get_field('accesibilte__description', $page_id); ?>
            <?= $accesibilteText?>
        </div>
    </section>

    <section class="parents__accompagnement">
<!--        <h3 class="parents__accompagnement__title">--><?php //= get_field('accompagne__title', $page_id); ?><!--</h3>-->
        <h3 class="parents__accompagnement__title"><?=$accompagneTitle ?></h3>

        <div class="parents__accompagnement__explication">
<!--            --><?php //= get_field('accompagne__description', $page_id); ?>
            <?= $accompagneText ?>
        </div>
    </section>

    <section class="parents__parler">
<!--        <h3 class="parents__parler__title">--><?php //= get_field('parler__title', $page_id); ?><!--</h3>-->
        <h3 class="parents__parler__title"><?= $parlerTitle?></h3>

        <div class="parents__parler____contenu">
<!--            --><?php //= get_field('parler__description', $page_id); ?><!-- -->
            <?= $parlerText ?>
        </div>
    </section>

</section>


