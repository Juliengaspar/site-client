<?php if(!is_front_page()): ?>
    <nav class="breadcrumb" aria-label="Fil d'Ariane">
        <a href="<?= home_url(); ?>" class="breadcrumb__link">Accueil</a>
        <span class="breadcrumb__separator">&rsaquo;</span>
        <span class="breadcrumb__page"><?php the_title(); ?></span>
    </nav>
<?php endif; ?>