<?php get_header(); ?>
<main class="main">
    <section class="documents">

        <h2>Bibliothèque de prompts</h2>

        <?php
        $categories = get_terms(array(
                'taxonomy' => 'categorie_document',
                'hide_empty' => false,
        ));

        foreach ($categories as $cat) :
            ?>

            <div class="doc-category">
                <h2><?php echo $cat->name; ?></h2>

                <div class="doc-list">

                    <?php
                    $args = array(
                            'post_type' => 'documents',
                            'tax_query' => array(
                                    array(
                                            'taxonomy' => 'categorie_document',
                                            'field' => 'term_id',
                                            'terms' => $cat->term_id,
                                    ),
                            ),
                            'meta_key' => 'numero',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC'
                    );

                    $query = new WP_Query($args);

                    while ($query->have_posts()) : $query->the_post();

                        $file = get_field('fichier_word');
                        ?>

                        <div class="doc-item">
                            <span class="doc-title"><?php the_title(); ?></span>

                            <?php if ($file): ?>
                                <a href="<?php echo $file['url']; ?>" download class="btn-download">
                                    Télécharger
                                </a>
                            <?php endif; ?>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                </div>
            </div>

        <?php endforeach; ?>

    </section>

</main>


<?php get_footer(); ?>