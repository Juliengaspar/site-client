<?php
/*
Template Name: Login template
*/

get_header(); ?>
<main class="main">

<?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php');
    include get_template_directory() . '/templates/componements/connexion/textLogin.php';
?>
<?php \wtl\Helpers::render_partial('login-form.php'); ?>

<?php
    include get_template_directory() . '/templates/componements/connexion/redirectionPage.php';
    ?>
</main>

<?php get_footer(); ?>