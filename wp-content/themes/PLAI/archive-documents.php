<?php get_header(); ?>
<main class="main">
    <section class="documents">
        <h2 class="title">Ressources</h2>
        <section class="documents-page__intro">

            <?php
            $intro_title = get_field('title__page__document', 'option');
            $intro_content = get_field('document__explications', 'option');
            $explication_content = get_field('document__text__telechargeable', 'option');
            ?>

            <?php if($intro_title): ?>
                <h3>
                    <?php echo esc_html($intro_title); ?>
                </h3>
            <?php endif; ?>

            <?php if($intro_content): ?>
                <div class="documents-page__text">
                    <?= $intro_content; ?>
                    <?= $explication_content ?>
                </div>
            <?php endif; ?>

        </section>

        <?php
        $categories = get_terms(array(
                'taxonomy' => 'categorie_document',
                'hide_empty' => false,
        ));

        foreach ($categories as $cat) :
            $descriptions = get_field('description');
            ?>

            <div class="doc-category">
                <h2><?php echo $cat->name; ?></h2>
                    <div>
                        <a href="<?= get_field('fichier_word')['url'] ?>">
                        <?= get_field('description') ?>
                        </a>
                    </div>

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


while ($query->have_posts()) :
    $query->the_post();

    $file = get_field('fichier_word');
    $numero = get_field('numero');
?>

                    <article class="doc-item">

                        <div class="doc-content">



                            <h3 class="doc-title">
                                <?php the_title(); ?>
                                <div><?= $descriptions ?></div>
                            </h3>

                        </div>

                        <?php if ($file): ?>

                            <a
                                    href="<?php echo esc_url($file['url']); ?>"
                                    class="btn-download"
                                    download
                            >
                                Télécharger
                            </a>

                        <?php endif; ?>

                    </article>

                    <?php
                    endwhile;

                    wp_reset_postdata();
                    ?>

                </div>
            </div>

        <?php endforeach; ?>

    </section>

</main>


<?php get_footer(); ?>