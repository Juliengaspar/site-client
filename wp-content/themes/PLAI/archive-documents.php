<?php get_header(); ?>

    <main class="main" role="main" itemscope itemtype="https://schema.org/DigitalDocument">
        <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>

        <nav class="header__nav">
            <h2 class="sro">Barre de navigation</h2>
            <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
        </nav>

        <section class="documents">

            <!-- Titre dynamique du CPT -->
            <h2 class="documents__title" itemprop="headline">
                <?= post_type_archive_title('', false); ?>
            </h2>

            <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>
            <section class="documents__intro">

                <?php
                $intro_title = get_field('title__page__document', 'option');
                $intro_content = get_field('document__explications', 'option');
                $explication_content = get_field('document__text__telechargeable', 'option');
                ?>

                <?php if ($intro_title) : ?>
                    <h3 class="documents__intro__title" itemprop="alternativeHeadline">
                        <?= esc_html($intro_title); ?>
                    </h3>
                <?php endif; ?>

                <?php if ($intro_content) : ?>
                    <div class="documents__intro__contenu" itemprop="description">
                        <?= wp_kses_post($intro_content); ?>
                        <?= wp_kses_post($explication_content); ?>
                    </div>
                <?php endif; ?>

            </section>

            <?php
            $categories = get_terms(array(
                    'taxonomy'   => 'categorie_document',
                    'hide_empty' => true,
            ));
            ?>

            <?php if ($categories && !is_wp_error($categories)) : ?>

                <?php foreach ($categories as $cat) : ?>

                    <section class="documents__category" itemscope itemtype="https://schema.org/CategoryCode">

                        <h3 class="documents__category__title" itemprop="name">
                            <?= esc_html($cat->name); ?>
                        </h3>

                        <div class="documents__category__listes" itemprop="description">

                            <?php
                            $args = array(
                                    'post_type'      => 'documents',
                                    'posts_per_page' => -1,

                                    'tax_query' => array(
                                            array(
                                                    'taxonomy' => 'categorie_document',
                                                    'field'    => 'term_id',
                                                    'terms'    => $cat->term_id,
                                            ),
                                    ),
                            );

                            $query = new WP_Query($args);
                            ?>

                            <?php if ($query->have_posts()) : ?>

                                <?php while ($query->have_posts()) : $query->the_post(); ?>

                                    <?php
                                    $file = get_field('fichier_word');
                                    $description = get_field('description');
                                    ?>

                                    <?php if ($file) : ?>

                                        <article class="documents__category__contenu">
                                            <a href="<?= esc_url($file['url']) ?>" class="documents__download documents__category__link" title="<?= esc_attr($file['title']); ?>" itemprop="identifier" download>
                                                <div class="documents__category__link"> <?= wp_kses_post($description); ?> </div>
                                            </a>
                                        </article>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </section>

                <?php endforeach; ?>

            <?php endif; ?>

        </section>

    </main>

<?php get_footer(); ?>