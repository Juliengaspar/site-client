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
    <?php include('wp-content/themes/PLAI/templates/componements/enseignement/titles.php')?>
    <section class="acceuil">
        <?php if($Enseignanttitle): ?>
            <h2><?= esc_html($Enseignanttitle) ?></h2>
        <?php endif; ?>

        <?php if($EnseignantDescription): ?>
            <?= wp_kses_post($EnseignantDescription) ?>
        <?php endif; ?>

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