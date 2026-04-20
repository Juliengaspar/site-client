<?php
/*
 * Template Name: School template
 */

get_header();

if (!\wtl\Authentication::is_logged_in()) {
    wp_safe_redirect(home_url('/connexion/'));
    exit;
}

if (!\wtl\Authentication::has_school_access()) {
    wp_safe_redirect(home_url('/mon-espace/'));
    exit;
}

// Injection du contexte école
if (!\wtl\Helpers::setup_school_post_context()) {
    echo '<p>Aucune école disponible.</p>';
    get_footer();
    return;
}
?>

<?php get_template_part( 'templates/components/stage/stage'); ?>
<?php get_template_part('templates/components/fase/fase-warning'); ?>
<?php if (have_rows('content')) : ?>
    <?php while (have_rows('content')) : the_row(); ?>
        <?php include locate_template('templates/components/flexible.php'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
\wtl\Helpers::reset_post_context();
get_footer(); ?>