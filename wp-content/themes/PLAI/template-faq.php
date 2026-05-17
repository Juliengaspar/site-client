<?php /* Template Name: faq */?>
<?php get_header()?>
<main class="main">
    <?php
    $faqContenu = get_field('explication__page');
    ?>
    <section class="faq__contenu">
        <h2 class="faq__contenu__title acceuil__title"><?= get_the_title()?></h2>
        <div class="faq__contenu__explication">
            <?= $faqContenu?>
        </div>
    </section>
<section class="faq">

    <?php if( have_rows('faq_items') ) : ?>

        <div class="accordion">

            <?php while( have_rows('faq_items') ) : the_row();

                $question = get_sub_field('question');
                $reponse = get_sub_field('reponse');

                ?>

                <details class="accordion__item">

                    <summary class="accordion__header">

                        <h3 class="accordion__heading">
                            <?= esc_html($question); ?>
                        </h3>

                        <span class="accordion__icon"></span>

                    </summary>

                    <div class="accordion__content">
                        <?= wp_kses_post($reponse); ?>
                    </div>

                </details>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

</section>

</main>

<?php get_footer()?>
