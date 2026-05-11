<?php get_header(); ?>

    <main class="main">
        <section class="content__ressources">
<!--            <h2 class="acceuil__title">--><?php //the_field('title__page', 'option'); ?><!--</h2>-->
<!---->
<!--            <section>-->
<!--                <h3>--><?php //the_field('title__contenu', 'option'); ?><!--</h3>-->
<!--                <div>--><?php //the_field('description__contenu', 'option'); ?><!--</div>-->
<!--            </section>-->
        </section>

        <section class="page-ressources">
            <h2 class="sro">Outils/IA</h2> <!-- Modifié selon votre image -->

            <section class="container">
                <?php
                // Récupérer TOUTES les catégories de type_ia
                $terms = get_terms(array(
                    'taxonomy' => 'type_ia',
                    'hide_empty' => true,
                    'orderby' => 'name',
                    'order' => 'ASC'
                ));

                if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) : ?>

                        <section class="categorie">
                            <h2><?= esc_html($term->name); ?></h2>

                            <div class="grid-ressources">
                                <?php
                                $args = array(
                                    'post_type' => 'ia',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'type_ia',
                                            'field' => 'slug',
                                            'terms' => $term->slug,
                                        ),
                                    ),
                                    'orderby' => 'title',
                                    'order' => 'ASC'
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        $url_field = get_field('url__ia');
                                        $url = '';

                                        if (is_array($url_field) && isset($url_field['url'])) {
                                            $url = $url_field['url'];
                                        } elseif (is_string($url_field)) {
                                            $url = $url_field;
                                        }

                                        if (empty($url)) continue;

                                        $description = get_field('description__ia');
                                        $image = get_field('images__ia');
                                        ?>

                                        <a href="<?= esc_url($url); ?>" target="_blank" class="card-ressource">
                                            <?php if ($image && isset($image['url'])) : ?>
                                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? ''); ?>">
                                            <?php endif; ?>

                                            <h3><?php the_title(); ?></h3>

                                            <?php if ($description) : ?>
                                                <p><?= $description; ?></p>
                                            <?php endif; ?>
                                        </a>

                                    <?php endwhile;
                                    wp_reset_postdata();
                                else : ?>
                                    <p>Aucune IA dans cette catégorie.</p>
                                <?php endif; ?>
                            </div>
                        </section>

                    <?php endforeach;
                else : ?>
                    <p>Aucune catégorie d'IA trouvée. Veuillez d'abord créer des catégories dans "Types de ia".</p>
                <?php endif; ?>
            </section>
        </section>
    </main>

<?php get_footer(); ?>