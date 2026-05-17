<?php /* Template Name: Mission */?>
<?php get_header(); ?>
<?php
$titleMissionIndividuel = get_field('title__mission__individuelles');
$titleMissioncollective = get_field('title__mission__collectives')

?>
<main class="main">



    <?php
    function display_missions($field_name, $section_title) {

        if( have_rows($field_name) ) : ?>

            <section class="missions">
                <h2 class="missions__title">
                    <?= esc_html($section_title); ?>
                </h2>

                <div class="accordion">

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
    display_missions('missions_individuelles', $titleMissionIndividuel);

    display_missions('missions_collectives', $titleMissioncollective);
    ?>
</main>


<?php get_footer(); ?>



