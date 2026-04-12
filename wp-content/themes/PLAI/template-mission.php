<?php /* Template Name: Mission */?>
<?php get_header(); ?>
<?php
$titleMissionIndividuel = get_field('title__mission__individuelles');
$titleMissioncollective = get_field('title__mission__collectives')

?>

<section class="missions">

    <!-- FIL D’ARIANE -->
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>">Accueil</a>
        <span class="arrow">➤</span>
        <span>Mission</span>
    </div>

    <h1>NOS MISSIONS PRINCIPALES</h1>

    <!-- MISSIONS INDIVIDUELLES -->
    <div class="missions__section">
        <h2><?= $titleMissionIndividuel ?></h2>

        <?php if( have_rows('missions_individuelles') ): ?>
            <?php while( have_rows('missions_individuelles') ): the_row(); ?>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <span class="arrow">▼</span>
                        <h3><?php the_sub_field('titre_mission'); ?></h3>
                    </div>

                    <div class="accordion-content">
                        <p><?php the_sub_field('description_mission'); ?></p>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <!-- MISSIONS COLLECTIVES -->
    <div class="missions__section">
        <h2><?= $titleMissioncollective ?></h2>

        <?php if( have_rows('missions_collectives') ): ?>
            <?php while( have_rows('missions_collectives') ): the_row(); ?>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <span class="arrow">▼</span>
                        <h3><?php the_sub_field('titre_mission'); ?></h3>
                    </div>

                    <div class="accordion-content">
                        <p><?php the_sub_field('description_mission'); ?></p>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>



