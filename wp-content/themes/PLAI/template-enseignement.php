<?php /* Template Name: Enseignement */?>
<?php
$Enseignanttitle = get_field("title__enseigent");
$EnseignantDescription = get_field("desscription__title");
$EnseignantPossibilite = get_field("possibilite");
$EnseignantExemple = get_field("Exemples__cas");
$EnseignanLast = get_field("text__last");
$EnseignanLink = get_field("link__formations");
?>

<?php get_header()?>
<main class="main enseignant-page">

    <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>


    <nav class="header__nav">
        <h2 class="sro">Barre de navigation</h2>
        <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
        <?php
        ?>


    </nav>
    <?php include('wp-content/themes/PLAI/templates/componements/enseignement/titles.php')?>
    <section class="enseignement">
        <?php if($Enseignanttitle): ?>
            <h2 class="enseignement__title"><?= esc_html($Enseignanttitle) ?></h2>
        <?php endif; ?>
        <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

        <?php if($EnseignantDescription): ?>
            <div class="enseignant-page__description">
                <?= wp_kses_post($EnseignantDescription); ?>
            </div>
        <?php endif; ?>
        <div>
            <?php
            if($EnseignantPossibilite) {
                // Si c'est un champ WYSIWYG ou texte
            echo wp_kses_post($EnseignantPossibilite);

            }
            ?>
        </div>
    <?php include('wp-content/themes/PLAI/templates/componements/enseignement/redirections.php')?>

        <div>
            <?php
            if($EnseignantExemple) {
              echo wp_kses_post($EnseignantExemple);
            }
            ?>
        </div>

        <div>
            <?php
            // Vérifier le type du champ ACF "link__formations"
            if($EnseignanLink) {
                // Si c'est un champ de type "lien" ACF
                if(is_array($EnseignanLink) && isset($EnseignanLink['url'])) {
                    ?>
                    <a href="<?= esc_url($EnseignanLink['url']) ?>" title="<?= esc_attr($EnseignanLink['title']) ?>" class="btn"><?= esc_html($EnseignanLink['title']); ?></a>
                    <?php
                }
                // Si c'est un champ texte classique
                else if(is_string($EnseignanLink)) {
                    echo wp_kses_post($EnseignanLink);
                }
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer()?>