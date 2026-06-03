<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<main class="main">
    <nav class="header__nav">
        <h2 class="sro">Barre de navigation</h2>
        <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
        <?php
        ?>
    </nav>
    <?php
    $titleContact = get_field("title__contact");
    $textContact = get_field("explications__contenu");
    ?>
    <section>
        <h2><?= $titleContact?></h2>
        <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

        <div>
            <?=$textContact ?>
        </div>
    </section>

</main>


<?php get_footer(); ?>
