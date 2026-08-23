<nav class="private__nav" aria-label="Navigation private">
    <button
            class="burger-menu"
            type="button"
            aria-label="Ouvrir le menu"
            aria-expanded="false"
            aria-controls="menu-private"
    >        <span class="burger-menu__line"></span>
        <span class="burger-menu__line"></span>
        <span class="burger-menu__line"></span>
    </button>

    <?php
    wp_nav_menu([
            'theme_location' => 'navigation__private',
            'container'      => false,
            'menu_id'        => 'menu-private',
            'menu_class'     => 'menu-private',
            'fallback_cb'    => false,
            'depth'          => 1,
    ]);
    ?>
</nav>