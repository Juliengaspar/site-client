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


    </nav>

    <?php include('wp-content/themes/PLAI/templates/componements/enseignement/titles.php')?>
    <section class="enseignement">
        <?php if($Enseignanttitle): ?>
            <h2 class="enseignement__title"><?= esc_html($Enseignanttitle) ?></h2>
        <?php endif; ?>
        <?php echo 'toto'?>

        <?php if($EnseignantDescription): ?>
            <?= wp_kses_post($EnseignantDescription) ?>
        <?php endif; ?>
        <?php echo 'toto'?>
        <div>
            <?php
            if($EnseignantPossibilite) {
                // Si c'est un champ WYSIWYG ou texte
                if(is_string($EnseignantPossibilite)) {
                    echo wp_kses_post($EnseignantPossibilite);
                }
                // Si c'est un champ répéteur ou autre type
                else if(is_array($EnseignantPossibilite)) {
                    echo '<pre>' . print_r($EnseignantPossibilite, true) . '</pre>';
                }
            }
            ?>
        </div>
    <?php include('wp-content/themes/PLAI/templates/componements/enseignement/redirections.php')?>
<?php echo 'toto'?>

        <div>
            <?php
            if($EnseignantExemple) {
                if(is_string($EnseignantExemple)) {
                    echo wp_kses_post($EnseignantExemple);
                } else if(is_array($EnseignantExemple)) {
                    echo '<pre>' . print_r($EnseignantExemple, true) . '</pre>';
                }
            }
            ?>
        </div>

        <div>
<?php echo 'toto'?>
            <?php
            // Vérifier le type du champ ACF "link__formations"
            if($EnseignanLink) {
                // Si c'est un champ de type "lien" ACF
                if(is_array($EnseignanLink) && isset($EnseignanLink['url'])) {
                    ?>
                    <a href="<?= esc_url($EnseignanLink['url']) ?>">
                        <?= esc_html($EnseignanLink['title']) ?>
                    </a>
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