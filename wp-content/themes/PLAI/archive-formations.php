<?php get_header(); ?>

    <main class="main">
            <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php');?>
        <nav class="header__nav">
            <h2 class="sro">Barre de navigation</h2>
            <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
            <?php
            ?>
        </nav>

        <section class="formations__hero" itemscope itemtype="https://schema.org/ItemList">
                <h2 class="formations__title" itemprop="headline">
                     Formations
                </h2>
            <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

                <section class="formations__grid" aria-label="Liste des formations">
                    <h3 class="sro">Liste de formations</h3>

                    <?php
                    $formations = new WP_Query(array(
                        'post_type' => 'formations',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    ?>

                    <?php if ($formations->have_posts()) : ?>
                        <?php while ($formations->have_posts()) : $formations->the_post(); ?>

                            <?php
                            $imgFormations = get_field('formation__img');
                            $titleFormations = get_field('title__formation');
                            $descriptionFormations = get_field('description__formations');

                            ?>

                            <article class="formation-card"    itemscope itemtype="https://schema.org/Course" itemprop="itemListElement">
                                    <figure class="formation-card__image">

                                        <?php if ($imgFormations) : ?>
                                            <img src="<?= esc_url($imgFormations['url']); ?>" alt="<?= esc_attr($imgFormations['alt']); ?>" title="<?= $imgFormations['title']; ?>" class="formation-card__img" itemprop="image"
                                                 srcset="
                                                     <?= esc_url(wp_get_attachment_image_url($imgFormations['ID'], 'square-small')); ?> 400w,
                                                     <?= esc_url(wp_get_attachment_image_url($imgFormations['ID'], 'square-medium')); ?> 800w,
                                                     <?= esc_url(wp_get_attachment_image_url($imgFormations['ID'], 'square-large')); ?> 1200w
                                                     " sizes="(max-width: 768px) 90vw, (max-width: 1200px) 50vw,   400px" >
                                        <?php endif; ?>

                                    </figure>

                                    <section class="formation-card__content">

                                        <h3 class="formation-card__title">
                                                <?= esc_html($titleFormations) ?>
                                        </h3>

                                        <?php if ($descriptionFormations) : ?>

                                            <p class="formation-card__subtitle" itemprop="description">
                                                <?= esc_html($descriptionFormations) ?>
                                            </p>

                                        <?php endif; ?>
                                    </section>
                            </article>

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p>Aucune formation disponible actuellement.&nbsp;</p>
                    <?php endif; ?>
                </section>
        </section>

    </main>

<?php get_footer(); ?>