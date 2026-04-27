<?php if( have_rows('sections_ressources') ): ?>

    <?php while( have_rows('sections_ressources') ): the_row(); ?>

        <section class="section-ressources">
            <h2><?php the_sub_field('titre_section'); ?></h2>

            <div class="grid-outils">

                <?php if( have_rows('liste_outils') ): ?>
                    <?php while( have_rows('liste_outils') ): the_row();

                        $image = get_sub_field('image_outil');
                        $titre = get_sub_field('titre_outil');
                        $desc = get_sub_field('description_outil');
                        $lien = get_sub_field('lien_outil');
                        ?>

                        <div class="card-outil">
                            <a href="<?php echo esc_url($lien); ?>" target="_blank">

                                <?php if($image): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $titre; ?>">
                                <?php endif; ?>

                                <h3><?php echo $titre; ?></h3>
                                <p><?php echo $desc; ?></p>

                            </a>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </section>

    <?php endwhile; ?>

<?php endif; ?>