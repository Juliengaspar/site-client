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
    <title><?= get_the_title()?></title>
    <link rel="stylesheet" type="text/css" href="<?=dw_asset('css')?>">
    <script src="<?= dw_asset('js')?>" defer ></script>

</head>

<body <?php body_class(); ?>>

<header class="header">
    <h1 class="sro">Header</h1>

    <!-- LOGO -->
    <div class="header__logo">
        <?php $logo = get_field('header_logo', 'option'); ?>

        <a href="<?= home_url(); ?>" class="header__logo__links">
            <?php if($logo): ?>
                <img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>" class="header__logo__img">
            <?php else: ?>
                <span>PLAI</span>
            <?php endif; ?>
        </a>
    </div>
    <div class="header__burger" id="burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- NAVIGATION -->
    <nav class="header__nav">
        <h2 class="sro">Barre de navigation</h2>

        <?php
        wp_nav_menu([
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'header__nav__list',
        ]);
        ?>
    </nav>

    <!-- MODE FALC -->
    <div class="header__accessibility">
        <?php
        /*
        $current_path = strtok($_SERVER["REQUEST_URI"], '?');
        $falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : '';
       ?>

        <a href="<?= esc_url($current_path . ($falc ? '' : '?falc=true')); ?>">
            <?= $falc ? 'Mode classique' : 'Mode FALC'; ?>
        </a> */?>
    </div>

    <!-- SEARCH -->
    <div class="header__search">
        <?php get_search_form(); ?>
    </div>

</header>

<?php if(!is_front_page()): ?>
    <nav class="breadcrumb">
        <a href="<?= home_url(); ?>">Accueil</a>
        <span>›</span>
        <span><?php the_title(); ?></span>
    </nav>
<?php endif; ?>
