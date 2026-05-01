<?php
/**
 * Template part for the teaching page header
 *
 * @package PLAI
 */

// Récupération des champs ACF avec vérification
$logo = get_field('logo__plai');
$title = get_field('title__page');
$menu_location = 'navigation__pivate'; // 👈 Nom identique à functions.php
?>

<section class="enseignement-header acceuil" aria-labelledby="enseignement-header-title">
    <?php if (!empty($logo) && is_array($logo)) : ?>
        <div class="enseignement-header__logo">
            <img src="<?= esc_url($logo['url']) ?>"
                 alt="<?= esc_attr($logo['alt'] ?: get_bloginfo('name')) ?>"
                 class="enseignement-header__image"
                 width="<?= esc_attr($logo['width'] ?? 'auto') ?>"
                 height="<?= esc_attr($logo['height'] ?? 'auto') ?>"
                 loading="lazy">
        </div>
    <?php endif; ?>

    <?php if (!empty($title)) : ?>
        <h2 id="enseignement-header-title" class="enseignement-header__title">
            <?= esc_html($title) ?>
        </h2>
    <?php endif; ?>

    <nav class="enseignement-header__nav" aria-label="Navigation principale">
        <h2 class="screen-reader-text sro">Menu de navigation</h2>

        <?php
        // Vérifier si le menu existe avant de l'afficher
        if (has_nav_menu($menu_location)) :
            wp_nav_menu([
                    'theme_location' => $menu_location,
                    'container'      => false,
                    'menu_class'     => 'enseignement-header__nav-list',
                    'fallback_cb'    => false,
                    'depth'          => 2
            ]);
        else :
            echo '<p class="error-message">Menu non configuré. Veuillez créer un menu dans "Apparence > Menus".</p>';
        endif;
        ?>
    </nav>
</section>