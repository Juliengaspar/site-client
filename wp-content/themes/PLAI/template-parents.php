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
$carteTitle = $falc ? get_field('carte__title__falc' , $page_id) : get_field('carte__title' , $page_id);
?>


<section class="parents" itemscope itemtype="https://schema.org/WebPage">
    <div class="parents__contenu">
    <h2 class="parents__title "  itemprop="headline"><?= get_field('title__page', $page_id); ?></h2>
    </div>
    <div class="parents__cadre">
    <section class="parents__ecole"    itemscope itemtype="https://schema.org/Article">
        <h3 class="parents__title subtitle sro" itemprop="headline"><?= esc_html($accesibilteTitle); ?></h3>

        <div class="parents__ecole__explication" itemprop="articleBody">
            <?= wp_kses_post($accesibilteText); ?>
        </div>



    </section>

    <section class="parents__accompagnement" itemscope itemtype="https://schema.org/Article">
        <h3 class="parents__accompagnement__title subtitle"  itemprop="headline"><?=esc_html($accompagneTitle); ?></h3>

        <div class="parents__accompagnement__explication" itemprop="articleBody">
            <?= wp_kses_post($accompagneText); ?>
        </div>
        <section class="cartes">
            <h3><?=  esc_html($carteTitle)?> </h3>
            <?php if (have_rows('accompagne__cartes', $page_id)) : ?>

                <?php while (have_rows('accompagne__cartes', $page_id)) : the_row(); ?>

                    <?php
                    $image = get_sub_field('image', false);
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    // Si ACF retourne un tableau contenant l'ID
                    if (is_array($image)) {
                        $image = reset($image);
                    }       ?>

                    <section class="carte">
                        <?php if ($image) : ?>

                            <div class="carte__image">

                                <?= wp_get_attachment_image(
                                        (int) $image,
                                        'medium',
                                        false,
                                        [
                                                'loading' => 'lazy',
                                                'itemprop' => 'image'
                                        ]
                                ); ?>

                            </div>

                        <?php endif; ?>
                        <?php if ($title) : ?>
                            <h4 class="carte__title"><?= esc_html($title); ?></h4>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="carte__text">
                                <?= wp_kses_post($description); ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endwhile; ?>

            <?php endif; ?>
        </section>
    </section>

    <section class="parents__parler"  itemscope itemtype="https://schema.org/Article">
        <h3 class="parents__parler__title subtitle" itemprop="headline"><?= esc_html($parlerTitle);?></h3>

        <div class="parents__parler__contenu" itemprop="articleBody">
            <?= wp_kses_post($parlerText); ?>
        </div>
    </section>
    </div>

</section>


