<?php /* Template Name: faq */?>
<?php get_header()?>
<main class="main" role="main" itemscope itemtype="https://schema.org/WebPage">
    <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>

    <nav class="header__nav">
        <h2 class="sro">Barre de navigation</h2>
        <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
    </nav>
    <?php
    $faqContenu = get_field('explication__page');
    ?>
    <section class="faq__contenu">
        <h2 class="faq__contenu__title acceuil__title" itemprop="name"  aria-label="titre de la page faq"><?= get_the_title()?></h2>
        <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

        <div class="faq__contenu__explication">
            <?= $faqContenu?>
        </div>
    </section>
<section class="faq">

    <?php if( have_rows('faq_items') ) : ?>

        <div class="accordion" itemscope itemtype="https://schema.org/ItemList">

            <?php while( have_rows('faq_items') ) : the_row();

                $question = get_sub_field('question');
                $reponse = get_sub_field('reponse');

                ?>

                <details class="accordion__item">

                    <summary class="accordion__header">

                        <h3 class="accordion__heading"  itemprop="name">
                            <?= esc_html($question); ?>
                        </h3>

                        <span class="accordion__icon"  aria-hidden="true"></span>

                    </summary>

                    <div class="accordion__content"  itemprop="description">
                        <?= wp_kses_post($reponse); ?>
                    </div>

                </details>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

</section>

</main>

<?php get_footer()?>
