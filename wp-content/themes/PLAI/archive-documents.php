<?php
/**
 * Template Name: Documents
 * Affiche la bibliothèque de documents téléchargeables
 */
?>
<?php get_header(); ?>

    <main class="main documents-page" role="main" itemscope itemtype="https://schema.org/DigitalDocument">
        <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>

        <nav class="header__nav">
            <h2 class="sro">Barre de navigation</h2>
            <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
        </nav>

        <section class="documents">

            <!-- Titre dynamique du CPT -->
            <h2 class="documents__title" itemprop="headline">
                <?= esc_html(post_type_archive_title('', false) ?: 'Bibliothèque de documents'); ?>
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

                <?php if ($intro_content || $explication_content) : ?>
                    <div class="documents__intro__contenu" itemprop="description">
                        <?= wp_kses_post($intro_content); ?>
                        <?= wp_kses_post($explication_content); ?>
                    </div>
                <?php endif; ?>

            </section>

            <?php
            $categories = get_terms([
                    'taxonomy'   => 'categorie_document',
                    'hide_empty' => true,
                    'orderby'    => 'name',
                    'order'      => 'ASC',
            ]);
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

                                    <?php if ($file && isset($file['url'])) : ?>
                                        <article class="documents__category__contenu">
                                            <a href="<?= esc_url($file['url']); ?>"
                                               class="documents__link"
                                               title="<?= esc_attr($file['title'] ?? get_the_title()); ?>"
                                               itemprop="identifier"
                                               aria-label="Télécharger <?= esc_attr(get_the_title()); ?>">                                                <div class="documents__category__link"> <?= wp_kses_post($description); ?> </div>
                                            </a>
                                            <span class="documents__link__icon" aria-hidden="true">📄</span>
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