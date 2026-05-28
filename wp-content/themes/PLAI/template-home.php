<?php /* Template Name: Homepage */?>
<?php get_header(); ?>
<main class="main">
    <nav class="header__nav">
        <h2 class="sro">Barre de navigation</h2>
        <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
        <?php
        /*      wp_nav_menu([
                  'theme_location' => 'navigation__private',
                  'container'      => 'nav',
                  'menu_class'     => 'menu-prive',
              ]);*/
        ?>
    <?php get_template_part('templates/components/header--logo/img'); ?>

    <?php include('wp-content/themes/PLAI/templates/componements/acceuil/first.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/acceuil/second.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/acceuil/chiffres.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/acceuil/mission.php')?>
<?php include('wp-content/themes/PLAI/template-parents.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/parents/explications.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/parents/accompagne.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/parents/parler.php')?>
<?php include('wp-content/themes/PLAI/templates/componements/acceuil/enseignement.php')?>
</main>



<?php get_footer(); ?>



