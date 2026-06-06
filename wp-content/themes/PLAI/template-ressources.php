<?php /* Template Name: Ressources */ ?>

<?php get_header(); ?>
    <main class="main" role="main" itemscope itemtype="https://schema.org/WebPage">
        <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>

        <nav class="header__nav">
            <h2 class="sro">Barre de navigation</h2>
            <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
            <?php
            ?>
        </nav>
        <section class="content__ressources">
            <h2 class="acceuil__title"><?= get_the_title() ?></h2>
            <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>


            <section class="content__ressources__explication">
                <h3 class="content__ressources__title">
                    <?php the_field('ressources_title_contenu' , 'option'); ?>
                </h3>

                <div class="content__ressources__text">
                    <?php the_field('ressources_description_contenu' , 'option'); ?>
                </div>
            </section>
        </section>

        <section class="page-ressources">
            <h2 class="sro">Ressources</h2>

            <section class="container"  itemscope itemtype="https://schema.org/ItemList">

                <?php
                // Récupérer les valeurs
                $titre_page = get_field('titre_page', );
                $description_page = get_field('description_page');

                // Afficher seulement si des valeurs existent
                if( $titre_page ) : ?>
                    <h3 class="container__title" itemprop="name"><?php echo esc_html($titre_page); ?></h3>
                <?php endif; ?>

                <?php if( $description_page ) : ?>
                    <p class="description" itemprop="description"><?php echo esc_html($description_page); ?></p>
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

                        <section class="categorie"  itemscope itemtype="https://schema.org/CategoryCode">
                            <h2 class="categorie__title" itemprop="name"><?= $term->name ?></h2>

                            <div class="grid-ressources" itemprop="description">

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

                                        <a href="<?=$url; ?>" target="_blank" class="card-ressource" itemprop="identifier">

                                            <?php if ($image && isset($image['url'])) : ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" itemprop="image"
                                                     srcset="
                                                        <?= esc_url(wp_get_attachment_image_url($image['ID'], 'square-small')); ?> 400w,
                                                        <?= esc_url(wp_get_attachment_image_url($image['ID'], 'square-medium')); ?> 800w,
                                                        <?= esc_url(wp_get_attachment_image_url($image['ID'], 'square-large')); ?> 1200w
                                                         " sizes="(max-width: 768px) 90vw, (max-width: 1200px) 50vw,   400px" >
                                            <?php endif; ?>

                                            <h3 itemprop="image"><?= the_title(); ?></h3>
                                            <?php if ($description) : ?>
                                                <p itemprop="description"><?=$description ?></p>
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