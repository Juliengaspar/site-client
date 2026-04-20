<?php /* Template Name: Ressources */?>

<?php get_header()?>
    <h3><?php the_field('titre_page'); ?></h3>
    <p><?php the_field('description_page'); ?></p>

<?php if( have_rows('categories') ): ?>

    <?php while( have_rows('categories') ): the_row(); ?>

        <h4><?php the_sub_field('nom_categorie'); ?></h4>

        <?php if( have_rows('ressources') ): ?>

            <?php while( have_rows('ressources') ): the_row(); ?>

                <div class="ressource-item">

                    <img src="<?php the_sub_field('image'); ?>" alt="">

                    <h3><?php the_sub_field('titre'); ?></h3>

                    <p><?php the_sub_field('description'); ?></p>

                    <a href="<?php the_sub_field('lien'); ?>" target="_blank">
                        Lien
                    </a>

                </div>

            <?php endwhile; ?>

        <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer()?>