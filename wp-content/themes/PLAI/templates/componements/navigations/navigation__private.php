<nav class="header__nav">

    <button class="burger-menu" aria-label="Ouvrir le menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <?php
    wp_nav_menu([
        'theme_location' => 'navigation__private',
        'container'      => false,
        'menu_class'     => 'menu-private',
    ]);
    ?>

</nav>