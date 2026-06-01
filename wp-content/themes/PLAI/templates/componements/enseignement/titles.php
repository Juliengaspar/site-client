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
<!--    --><?php //if (!empty($logo) && is_array($logo)) : ?>
<!--        <div class="enseignement-header__logo">-->
<!--            <img src="--><?php //= esc_url($logo['url']) ?><!--"-->
<!--                 alt="--><?php //= esc_attr($logo['alt'] ?: get_bloginfo('name')) ?><!--"-->
<!--                 class="enseignement-header__image"-->
<!--                 width="--><?php //= esc_attr($logo['width'] ?? 'auto') ?><!--"-->
<!--                 height="--><?php //= esc_attr($logo['height'] ?? 'auto') ?><!--"-->
<!--                 loading="lazy">-->
<!--        </div>-->
<!--    --><?php //endif; ?>



    <?php if (!empty($title)) : ?>
        <h2 id="enseignement-header-title" class="enseignement-header__title">
            <?= ($title) ?>
        </h2>
    <?php endif; ?>


</section>