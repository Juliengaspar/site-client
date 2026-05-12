    <?php
    $mission_title = get_field('mission_titre_section');
    $mission_button = get_field('mission_bouton');
    ?>

    <?php if (have_rows('missions')) : ?>

        <section class="missions-section" aria-labelledby="missions-title">

            <div class="missions-section__container">

                <?php if ($mission_title) : ?>
                    <section class="missions-section__header">
                        <h3 id="missions-title" class="missions-section__title">
                            <?=$mission_title ; ?>
                        </h3>
                    </section>
                <?php endif; ?>

                <div class="missions-section__grid">

                    <?php while (have_rows('missions')) : the_row();

                        $mission_type = get_sub_field('type_mission');
                        $mission_title_item = get_sub_field('titre_mission');
                        $mission_description = get_sub_field('description_mission');
                        $mission_icon = get_sub_field('icone_mission');

                        ?>

                        <article class="mission-card mission-card--<?php echo esc_attr($mission_type); ?>">

                            <div class="mission-card__inner">

                                <?php if ($mission_title_item) : ?>
                                    <h3 class="mission-card__title">
                                        <?php echo esc_html($mission_title_item); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($mission_icon) : ?>
                                    <div class="mission-card__icon-wrapper">

                                        <img
                                            class="mission-card__icon"
                                            src="<?php echo esc_url($mission_icon['url']); ?>"
                                            alt="<?php echo esc_attr($mission_icon['alt']); ?>"
                                            loading="lazy">

                                    </div>
                                <?php endif; ?>

                                <?php if ($mission_description) : ?>
                                    <p class="mission-card__description">
                                        <?=$mission_description; ?>
                                    </p>
                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endwhile; ?>
                    <div class="missions-section__cta">


                        <a
                            href="<?=$mission_button['url']; ?>"
                            class="missions-section__button">

                            <?=$mission_button['title']; ?>

                        </a>

                    </div>

                </div>


                <?php endif; ?>

            </div>

        </section>

