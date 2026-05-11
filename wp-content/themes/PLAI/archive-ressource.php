<?php get_header(); ?>

<section class="content__ressources">
    <h2><?php the_field('title__page', 'option'); ?></h2>
    <h2>Ressources</h2>

    <section>
        <h3><?php the_field('title__contenu', 'option'); ?></h3>
        <div><?php the_field('description__contenu', 'option'); ?></div>
    </section>
</section>

    <section class="ressources">


        <?php
        $terms = get_terms(array(
                'taxonomy' => 'type_ressource',
                'hide_empty' => true,
        ));

        foreach ($terms as $term) :
            ?>

            <div class="categorie">

                <h2><?php echo $term->name; ?></h2>

                <div class="grid">

                    <?php
                    $args = array(
                            'post_type' => 'ressource',
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

                            $url = get_field('url_ressource');
                            $desc = get_field('description_ressource');
                            $image = get_field('image_ressource');
                            ?>

                            <a href="<?php echo $url; ?>" target="_blank" class="card">

                                <?php if ($image) : ?>
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                <?php endif; ?>

                                <h3><?php the_title(); ?></h3>
                                <p><?php echo $desc; ?></p>

                            </a>

                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>

            </div>

        <?php endforeach; ?>

    </section>

<?php get_footer(); ?>