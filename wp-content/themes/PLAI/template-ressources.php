<?php /* Template Name: Ressources */ ?>

<?php get_header(); ?>
<main class="main">
    <section class="content__ressources">
        <h2 class="acceuil__title"><?php the_field('title__page', 'option'); ?></h2>

        <section>
            <h3><?php the_field('title__contenu', 'option'); ?></h3>
            <div><?php the_field('description__contenu', 'option'); ?></div>
        </section>
    </section>

    <section class="page-ressources">
        <h2 class="sro">Ressources</h2>

        <section class="container">

            <?php
            // Récupérer les valeurs
            $titre_page = get_field('titre_page', );
            $description_page = get_field('description_page');

            // Afficher seulement si des valeurs existent
            if( $titre_page ) : ?>
                <h3 class="container__title"><?php echo esc_html($titre_page); ?></h3>
            <?php endif; ?>

            <?php if( $description_page ) : ?>
                <p class="description"><?php echo esc_html($description_page); ?></p>
            <?php endif; ?>

            <?php
            // Récupérer toutes les catégories (taxonomies) du CPT ressource
            $terms = get_terms(array(
                    'taxonomy' => 'type_ressource',
                    'hide_empty' => true,
            ));

            if ($terms && !is_wp_error($terms)) :
                foreach ($terms as $term) :
                    ?>

                    <section class="categorie">
                        <h2><?= $term->name ?></h2>

                        <div class="grid-ressources">

                            <?php
                            // Récupérer les ressources de cette catégorie
                            $args = array(
                                    'post_type' => 'ressource',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                            array(
                                                    'taxonomy' => 'type_ressource',
                                                    'field' => 'slug',
                                                    'terms' => $term->slug,
                                            ),
                                    ),
                            );

                            $query = new WP_Query($args);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();

                                    // 🔥 CORRECTION : Gérer les différents types de retour ACF
                                    $url_field = get_field('url_ressource');
                                    $url = '';

                                    // Si le champ est un lien (type Link ACF)
                                    if (is_array($url_field) && isset($url_field['url'])) {
                                        $url = $url_field['url'];
                                    }
                                    // Si le champ est une chaîne simple (type URL ou Text)
                                    elseif (is_string($url_field)) {
                                        $url = $url_field;
                                    }
                                    // Si le champ est un objet ou autre
                                    elseif (is_object($url_field) && property_exists($url_field, 'url')) {
                                        $url = $url_field->url;
                                    }

                                    $description = get_field('description_ressource');
                                    $image = get_field('image_ressource');

                                    // Ne pas afficher si pas d'URL valide
                                    if (empty($url)) {
                                        continue;
                                    }
                                    ?>

                                    <a href="<?=$url; ?>" target="_blank" class="card-ressource" >

                                        <?php if ($image && isset($image['url'])) : ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                                        <?php endif; ?>

                                        <h3><?= the_title(); ?></h3>
                                        <?php if ($description) : ?>
                                            <p><?=$description ?></p>
                                        <?php endif; ?>

                                    </a>

                                <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                ?>
                                <p>Aucune ressource dans cette catégorie.</p>
                            <?php endif; ?>

                        </div>
                    </section>

                <?php
                endforeach;
            else :
                ?>
                <p>Aucune catégorie de ressource trouvée.</p>
            <?php endif; ?>

        </section>
    </section>
</main>


<?php get_footer(); ?>