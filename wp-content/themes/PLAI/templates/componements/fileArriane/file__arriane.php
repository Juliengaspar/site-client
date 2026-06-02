<?php if(!is_front_page()): ?>
    <nav class="breadcrumb">
        <a href="<?= home_url(); ?>">Accueil</a>
        <span>&rsaquo;</span>
        <span><?php the_title(); ?></span>
    </nav>
<?php endif; ?>
