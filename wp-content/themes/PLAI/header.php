<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Projet de création d’un site web, pour le pôle PLAI, réalisé avec WordPress  dans le cadre du cours de design web de deuxième année à la Haute École de la Province de Liège (HEPL)." />
    <meta name="keywords" content="référencement,SEO,balise meta keywords, help, PLAI, liége, aide, julien, gaspar, woordpresse, developeur, UX, UI, ">
    <meta name="author" content="Julien Gaspar">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  wp_get_document_title(); ?></title>
<!--    <link rel="stylesheet" type="text/css" href="--><?php //=dw_asset('css')?><!--">-->
    <link rel="stylesheet" type="text/css" href="<?=dw_asset('css')?>">
    <script src="<?= dw_asset('js')?>" defer ></script>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="header">
    <h1 class="sro">Header</h1>

    <!-- LOGO -->
    <div class="header__logo">
        <?php $logo = get_field('header_logo', 'option'); ?>

        <a href="<?= esc_url(home_url()); ?>" class="header__logo__links" aria-label="Accueil">
            <?php if ($logo && isset($logo['url'])) : ?>
                <img
                        src="<?= esc_url($logo['url']); ?>"
                        alt="<?= esc_attr($logo['alt'] ?? 'PLAI'); ?>"
                        class="header__logo__img"
                        loading="eager"
                        width="<?= esc_attr($logo['width'] ?? ''); ?>"
                        height="<?= esc_attr($logo['height'] ?? ''); ?>"
                >
            <?php else : ?>
                <span class="header__logo__text">PLAI</span>
            <?php endif; ?>
        </a>
    </div>
    <!-- ===== BURGER MENU ===== -->
    <button class="header__burger" id="burger" aria-label="Ouvrir le menu" aria-expanded="false">
        <span class="header__burger__line"></span>
        <span class="header__burger__line"></span>
        <span class="header__burger__line"></span>
    </button>
    <!-- NAVIGATION -->
    <nav class="nav" aria-label="Navigation principale">
        <?php
        wp_nav_menu([
                'theme_location' => 'header',
                'container'      => false,
                'menu_class'     => 'ul-container',
                'container_class' => 'div-container',

        ]);
        ?>
    </nav>
    <div class="header__accessibility">
        <?php
        $falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : '';
        $falc_url = $falc ? '?' : '?falc=true';
        $falc_label = $falc ? 'Classique' : 'Vue simplifiée (FALC)';
        ?>
        <a href="<?= esc_url($falc_url); ?>" class="header__falc" aria-label="Version FALC">
            <?= esc_html($falc_label); ?>
        </a>
    </div>

</header>

