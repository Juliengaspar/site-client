    <?php
    $mission_title = get_field('mission_titre_section');
    $mission_button = get_field('mission_bouton');
    ?>

    <?php if (have_rows('missions')) : ?>


        <section class="missions-section " aria-labelledby="missions-title" itemscope itemtype="https://schema.org/ItemList">

            <div class="missions-section__container">

                <?php if ($mission_title) : ?>
                    <section class="missions-section__header">
                        <h3 id="missions-title" class="missions-section__title" itemprop="name">
                            <?=$mission_title ; ?>
                        </h3>
                    </section>
                <?php endif; ?>

                <div class="missions-section__grid" itemprop="description">

                    <?php while (have_rows('missions')) : the_row();

                        $mission_type = get_sub_field('type_mission');
                        $mission_title_item = get_sub_field('titre_mission');
                        $mission_description = get_sub_field('description_mission');
                        $mission_icon = get_sub_field('icone_mission');
                        $description = get_sub_field('description');

                        ?>

                        <article class="mission-card mission-card--<?php echo esc_attr($mission_type); ?>" itemprop="itemListElement">

                            <div class="mission-card__inner">

                                <?php if ($mission_title_item) : ?>
                                    <h3 class="mission-card__title" itemprop="name">
                                        <?php echo esc_html($mission_title_item); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($mission_icon) : ?>
                                    <div class="mission-card__icon-wrapper" itemprop="description">

                                        <img
                                            class="mission-card__icon"
                                            src="<?php echo esc_url($mission_icon['url']); ?>"
                                            alt="<?php echo esc_attr($mission_icon['alt']); ?>"
                                            loading="lazy"
                                            itemprop="image">


                                    </div>
                                <?php endif; ?>

                                <?php if ($mission_description) : ?>
                                    <div class="mission-card__description" itemprop="description">
                                        <?= $mission_description; ?>
                                        <?= $description; ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endwhile; ?>
                    <section class="missions-section__cta">
                        <h2 class="sro">mission redirection</h2>
                        <a href="<?=$mission_button['url']; ?>" class="missions-section__button" itemprop="url"><?=$mission_button['title']; ?></a>
                    </section>
                </div>


                <?php endif; ?>

            </div>

        </section>

