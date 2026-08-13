<?php /* Template Name: Mission */ ?>
<?php get_header(); ?>

<?php
// Récupération du paramètre FALC
$falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : '';

// ID de la page courante
$page_id = get_the_ID();

// Champs simples (version normale ou FALC)
$title_page = $falc ? get_field('title__page__falc', $page_id) : get_field('title__page', $page_id);
$titleMissionIndividuel = $falc ? get_field('title__mission_individuelles__falc', $page_id) : get_field('title__mission_individuelles', $page_id);
$titleMissioncollective = $falc ? get_field('title__mission_collectives__falc', $page_id) : get_field('title__mission_collectives', $page_id);
$descriptionMissionindividuelles = $falc ? get_field('description__mission__individuelles__falc', $page_id) : get_field('description__mission__individuelles', $page_id);
$descriptionMissionCollectives = $falc ? get_field('description__mission__collectives__falc', $page_id) : get_field('description__mission__collectives', $page_id);
$logoPLaiAcceuil = get_field('logo_plai', $page_id);

// Nom des répéteurs selon le mode
$repeater_individuelles = $falc ? 'missions_individuelles__falc' : 'missions_individuelles';
$repeater_collectives = $falc ? 'missions_collectives__falc' : 'missions_collectives';

// Ajout d'une classe au body

?>

    <main class="main" itemscope itemtype="https://schema.org/WebPage">


        <!-- Lien FALC / Classique (comme dans Parents) -->
        <div class="title_contenu">
        <h2 id="title" class="missions__title title" itemprop="name"   aria-label="Changer de version (FALC ou classique)">
            <?= esc_html($title_page); ?>
        </h2>

        </div>
        <?php include get_template_directory() . '/templates/componements/fileArriane/file__arriane.php'; ?>

        <?php
        // Fonction pour afficher les missions (utilise le nom du répéteur passé en paramètre)
        function display_missions($repeater_name, $section_title, $section_description) {
            if( have_rows($repeater_name) ) : ?>
                <section class="missions" itemscope itemtype="https://schema.org/ItemList">
                    <h2 class="missions__subtile">
                        <?= esc_html($section_title); ?>
                    </h2>

                    <div class="accordion" role="list">
                        <?php if ($section_description) : ?>
                        <div class="accordion__explication"
                             itemprop="description">
                            <?= wp_kses_post($section_description); ?>
                        </div>
                        <?php endif; ?>
                        <?php while( have_rows($repeater_name) ) : the_row(); ?>
                            <details class="accordion__item" itemscope itemtype="https://schema.org/ListItem">
                                <summary class="accordion__header"  role="button" aria-expanded="false">
                                    <h3 class="accordion__heading" itemprop="name">
                                        <?php the_sub_field('titre_mission'); ?>
                                    </h3>
                                    <span class="accordion__icon" aria-hidden="true"></span>
                                </summary>
                                <div class="accordion__content" itemprop="description">
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