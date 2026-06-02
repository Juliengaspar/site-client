<?php /* Template Name: Mission */ ?>
<?php get_header(); ?>

<?php
// Récupération du paramètre FALC
$falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : '';

// ID de la page courante
$page_id = get_the_ID();

// Champs simples (version normale ou FALC)
$title_page = $falc ? get_field('title__page__falc', $page_id) : get_field('title__page__falc', $page_id);
$titleMissionIndividuel = $falc ? get_field('title_mission_individuelles__falc', $page_id) : get_field('title_mission_individuelles', $page_id);
$titleMissioncollective = $falc ? get_field('title_mission_collectives__falc', $page_id) : get_field('title_mission_collectives', $page_id);
$descriptionMissionindividuelles = $falc ? get_field('description__mission__individuelles__falc', $page_id) : get_field('description__mission__individuelles', $page_id);
$descriptionMissionCollectives = $falc ? get_field('description_mission_collectives__falc', $page_id) : get_field('description_mission_collectives', $page_id);
$logoPLaiAcceuil = get_field('logo_plai', $page_id);

// Nom des répéteurs selon le mode
$repeater_individuelles = $falc ? 'missions_individuelles__falc' : 'missions_individuelles';
$repeater_collectives = $falc ? 'missions_collectives__falc' : 'missions_collectives';

// Ajout d'une classe au body

?>

    <main class="main">

        <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>

        <!-- Lien FALC / Classique (comme dans Parents) -->
        <a href="<?= $falc ? '?' : '?falc=true'; ?>" title="Version FALC" class="falc">
            <?= $falc ? 'Classique' : 'FALC'; ?>
            <img src="<?= get_template_directory_uri(); ?>/assets/icons/FALC-V1.svg"
                 alt=""
                 aria-hidden="true"
                 class="falc__icon">
        </a>

        <h2 id="title" class="missions-section__title title" itemprop="name">
            <?= $title_page ?>
        </h2>
        <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

        <?php
        // Fonction pour afficher les missions (utilise le nom du répéteur passé en paramètre)
        function display_missions($repeater_name, $section_title, $section_description) {
            if( have_rows($repeater_name) ) : ?>
                <section class="missions">
                    <h2 class="missions__title">
                        <?= esc_html($section_title); ?>
                    </h2>

                    <div class="accordion">
                        <div class="accordion__explication">
                            <?= $section_description ?>
                        </div>
                        <?php while( have_rows($repeater_name) ) : the_row(); ?>
                            <details class="accordion__item">
                                <summary class="accordion__header">
                                    <h3 class="accordion__heading">
                                        <?php the_sub_field('titre_mission'); ?>
                                    </h3>
                                    <span class="accordion__icon"></span>
                                </summary>
                                <div class="accordion__content">
                                    <p>
                                        <?php the_sub_field('description_mission'); ?>
                                    </p>
                                </div>
                            </details>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endif;
        }
        ?>

        <?php
        // Affichage avec les bons répéteurs
        display_missions($repeater_individuelles, $titleMissionIndividuel, $descriptionMissionindividuelles);
        display_missions($repeater_collectives, $titleMissioncollective, $descriptionMissionCollectives);
        ?>

    </main>

<?php get_footer(); ?>