<?php
/*
Template Name:Documents
*/
get_header();
?>
<main class="main">
    <main class="documents-page">
        <h2><?= get_the_title() ?></h2>

        <section class="intro">
            <h3><?= get_field('intro_titre')?></h3>
            <?php
            while (have_posts()) : the_post();
                the_content(); // 👉 TEXTE ADMIN
                ?>
                <div>
                    <?= get_field('intro_description') ?>
                </div>
            <?php
            endwhile;
            ?>
        </section>

        <section class="documents-list">
            <h3><?= get_field('title__liste__document')?></h3>
            <?php get_template_part('template-parts/content', 'documents'); ?>
        </section>

    </main>
</main>


<?php get_footer(); ?>