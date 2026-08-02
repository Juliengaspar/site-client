<nav class="header__nav" aria-label="Navigation principale">
    <button class="burger-menu" aria-label="Ouvrir ou fermer le menu" aria-expanded="false">
        <span class="burger-menu__line"></span>
        <span class="burger-menu__line"></span>
        <span class="burger-menu__line"></span>
    </button>

    <?php
    wp_nav_menu([
            'theme_location' => 'navigation__private',
            'container'      => false,
            'menu_class'     => 'menu-private',
            'fallback_cb'    => false,
            'depth'          => 1,
    ]);
    ?>
</nav>