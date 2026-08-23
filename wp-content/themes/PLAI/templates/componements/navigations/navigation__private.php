<nav class="private__nav" aria-label="Navigation private">
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