<?php /* Template Name: Parents */?>
<?php

$parents_page = get_pages([
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-parents.php'
]);

$page_id = $parents_page[0]->ID;

$accesibilteTitle = get_field('accesibilte__title', $page_id);
?>

<section class="parents">
    <h2 class="parents__title"><?= get_field('title__page', $page_id); ?></h2>
    <section class="parents__ecole">
        <h3 class="parents__ecole__title"><?= $accesibilteTitle ?></h3>

        <div class="parents__ecole__explication">
            <?= get_field('accesibilte__description', $page_id); ?>
        </div>
    </section>

    <section class="parents__accompagnement">
        <h3 class="parents__accompagnement__title"><?= get_field('accompagne__title', $page_id); ?></h3>

        <div class="parents__accompagnement__explication">
            <?= get_field('accompagne__description', $page_id); ?>
        </div>
    </section>

    <section class="parents__parler">
        <h3 class="parents__parler__title"><?= get_field('parler__title', $page_id); ?></h3>

        <div class="parents__parler____contenu">
            <?= get_field('parler__description', $page_id); ?>
        </div>
    </section>

</section>


