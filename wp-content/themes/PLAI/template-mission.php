<?php /* Template Name: Mission */?>
<?php get_header(); ?>
<?php
$titleMissionIndividuel = get_field('title__mission__individuelles');
$titleMissioncollective = get_field('title__mission__collectives');
$descriptionMissionindividuelles =get_field("description__mission__individuelles");
$descriptionMissionCollectives =get_field("description__mission__collectives");
$logoPLaiAcceuil = get_field('logo__plai');


?>
<main class="main">

    <?php include ('wp-content/themes/PLAI/templates/componements/header--logo/img.php'); ?>


    <h2 id="title" class="missions-section__title title" itemprop="name">
        <?= get_field("title__page") ; ?>
    </h2>



    <?php
    function display_missions($field_name, $section_title, $section_description) {

        if( have_rows($field_name) ) : ?>

            <section class="missions">
                <h2 class="missions__title">
                    <?= esc_html($section_title); ?>
                </h2>

                <div class="accordion">
                    <div class="accordion__explication">
                        <?= $section_description ?>
                    </div>
                    <?php while( have_rows($field_name) ) : the_row(); ?>

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
    display_missions('missions_individuelles', $titleMissionIndividuel, $descriptionMissionindividuelles);

    display_missions('missions_collectives', $titleMissioncollective, $descriptionMissionCollectives);
    ?>
</main>


<?php get_footer(); ?>



