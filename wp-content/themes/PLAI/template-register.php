<?php
/*
Template Name: Register template
*/

get_header(); ?>
<main class="main">
    <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php');
include('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php') ;


    include get_template_directory() . '/templates/componements/connexion/textDemande.php';
?>
<?php \wtl\Helpers::render_partial('request-form.php'); ?>

   <?php  include get_template_directory() . '/templates/componements/connexion/redirection.php';?>
</main>

<?php get_footer(); ?>