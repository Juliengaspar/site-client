<?php
$logo = get_field('logo__plai');
$title = get_field('title__page');
$listeLiens = get_field('redirection__page');
?>
<section>
    <?php if (!empty($logo)):?>
    <div class="acceuil__images">
        <img src="<?= $logo['url']?>" alt="<?= $logo['alt']?>" class="acceuil__image" width="<?= $logo['width']?>" height="<?= $logo['height']?>">
    </div>
    <?php endif;  ?>
    <?php if (!empty($title)):?>
    <h3 class="acceuil__title"><?= $title ?></h3>
    <?php endif; ?>
    <nav class="breadcrumb-nav">
        <ul class="breadcrumb-list">
            <?php
            // 1. On parcourt le répéteur ACF
            if (have_rows('redirection__page')):
                while (have_rows('redirection__page')): the_row();
                    // On récupère l'objet lien d'ACF
                    $link = get_sub_field('redirection__page');
                    if( $link ): ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endif;
                endwhile;
            endif;

            // 2. On ajoute AUTOMATIQUEMENT la page actuelle à la fin
            ?>
            <li class="breadcrumb-item current">
                <?php the_title(); ?>
            </li>
        </ul>
    </nav>


</section>
