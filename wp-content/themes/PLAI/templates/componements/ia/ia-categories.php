<section class="container">
    <?php
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
                    $query = new WP_Query([
                        'post_type' => 'ia',
                        'posts_per_page' => -1,
                        'tax_query' => [[
                            'taxonomy' => 'type_ia',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ]],
                        'orderby' => 'title',
                        'order' => 'ASC'
                    ]);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                           // get_template_part('./ia-cards.php');
                            include './ia-cards.php';
                            endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>Aucune IA dans cette catégorie.</p>
                    <?php endif; ?>
                </div>
            </section>

        <?php endforeach;
    else : ?>
        <p>Aucune catégorie d'IA trouvée.</p>
    <?php endif; ?>
</section>