<?php get_header(); ?>

    <main class="main">
            <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php');?>
        <nav class="header__nav">
            <h2 class="sro">Barre de navigation</h2>
            <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
            <?php
            ?>
        </nav>

        <section class="formations__hero">
                <h2 class="formations__title">
                     Formations
                </h2>
            <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

                <section class="formations__grid">
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

                            <article class="formation-card">
                                    <figure class="formation-card__image">

                                        <?php if ($imgFormations) : ?>
                                            <img src="<?= $imgFormations['url']; ?>" alt="<?= $imgFormations['alt']; ?>" title="<?= $imgFormations['title']; ?>" class="formation-card__img">
                                        <?php endif; ?>

                                    </figure>

                                    <section class="formation-card__content">

                                        <h3 class="formation-card__title">
                                                <?= $titleFormations ?>
                                        </h3>

                                        <?php if ($descriptionFormations) : ?>

                                            <p class="formation-card__subtitle">
                                                <?= $descriptionFormations ?>
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